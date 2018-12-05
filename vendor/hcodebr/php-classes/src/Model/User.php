<?php
namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Mailer;
use \NewTech\Model;

class User extends Model
{
    const SESSION = "User";
    const ERROR   = "UserError";

    public static function userSession()
    {

        $user = User::getFromSession();

        $data['iduser'] = $user->getiduser();

        return $data;

    }

    public static function getFromSession()
    {

        $user = new User();

        if (isset($_SESSION[User::SESSION]) && (int) $_SESSION[User::SESSION]['iduser'] > 0) {

            $user->setData($_SESSION[User::SESSION]);
        }

        return $user;
    }

    public static function checkLogin($inadmin = true)
    {

        if (
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int) $_SESSION[User::SESSION]["iduser"] > 0
        ) {
            //Não Está Logado
            return false;

        } else {

            if ($inadmin === true && (bool) $_SESSION[User::SESSION]['inadmin'] === true) {

                return true;

            } else if ($inadmin === false) {

                return true;

            } else {

                return false;
            }

        }
    }

    public static function login($login, $password)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users a
			JOIN tb_persons b
			ON a.idperson = b.idperson
			WHERE a.deslogin = :LOGIN", array(
            ":LOGIN" => $login,
        ));

        if (count($results) === 0) {

            throw new \Exception("Usuário inexistente ou senha inválida.");
        }

        $data = $results[0];

        if (password_verify($password, $data["despassword"]) === true) {

            $user = new User();

            $data['desperson'] = utf8_encode($data['desperson']);

            $user->setData($data);

            $_SESSION[User::SESSION] = $user->getvalues();

            return $user;

        } else {

            throw new \Exception("Usuário inexistente ou senha inválida");

        }

    }

    public static function verifyLogin($inadmin = true)
    {

        if (!User::checkLogin($inadmin)) {

            header("Location: /admin/login");
            exit;
        }
    }

    public static function logout()
    {

        $_SESSION[User::SESSION] = null;

    }

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY a.iduser");
    }

    public function save()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
            ":desperson"   => $this->getdesperson(),
            ":deslogin"    => $this->getdeslogin(),
            ":despassword" => $this->getdespassword(),
            ":desemail"    => $this->getdesemail(),
            ":nrphone"     => $this->getnrphone(),
            ":inadmin"     => $this->getinadmin(),
        ));

        $this->setData($results[0]);

    }

    public function get($iduser)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
            "iduser" => $iduser,
        ));

        $this->setData($results[0]);
    }

    public function update()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
            ":iduser"      => $this->getiduser(),
            ":desperson"   => $this->getdesperson(),
            ":deslogin"    => $this->getdeslogin(),
            ":despassword" => $this->getdespassword(),
            ":desemail"    => $this->getdesemail(),
            ":nrphone"     => $this->getnrphone(),
            ":inadmin"     => $this->getinadmin(),
        ));

        $this->setData($results[0]);

    }

    public function delete()
    {

        $sql = new Sql();

        $sql->query("CALL sp_users_delete(:iduser)", array(
            ":iduser" => $this->getiduser(),
        ));

    }

    public static function getForgot($email)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT *
			FROM tb_persons a
			INNER JOIN tb_users b USING(idperson)
			WHERE a.desemail = :email;", array(
            ":email" => $email,
        ));

        if (count($results) === 0) {

            throw new \Exception("Não foi possível recuperar a senha.");

        } else {

            $data = $results[0];

            $resultsRecovery = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", array(
                ":iduser" => $data["iduser"],
                ":desip"  => $_SERVER["REMOTE_ADDR"],
            ));

            if (count($resultsRecovery) === 0) {

                throw new \Exception("Aviso: Não foi possível recuperar a senha.");
            } else {

                $dataRecovery = $resultsRecovery[0];
                $iv           = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                $code         = openssl_encrypt($dataRecovery['idrecovery'], 'aes-256-cbc', SECRET_KEY, 0, $iv);
                $result       = base64_encode($iv . $code);
                //if ($inadmin === true) {
                $link = LINK_HOST . "/admin/forgot/reset?code=$result";
                //} else {
                //$link = "http://www.sisouvcentenario.newtechtecnologia.com/forgot/reset?code=$result";
                //}
                $mailer = new Mailer($data["desemail"], $data["desperson"], utf8_decode("Redefinir sua senha do SisPapaiNoelWeb - Centenário do Sul"), "forgot", array(
                    "name" => $data['desperson'],
                    "link" => $link,
                ));

                $mailer->send();

                return $data;
            }

        }
    }

    public static function validForgotDecrypt($result)
    {

        $result     = base64_decode($result);
        $code       = mb_substr($result, openssl_cipher_iv_length('aes-256-cbc'), null, '8bit');
        $iv         = mb_substr($result, 0, openssl_cipher_iv_length('aes-256-cbc'), '8bit');
        $idrecovery = openssl_decrypt($code, 'aes-256-cbc', SECRET_KEY, 0, $iv);
        $sql        = new Sql();
        $results    = $sql->select("
			SELECT *
			FROM tb_userspasswordsrecoveries a
			INNER JOIN tb_users b USING(iduser)
			INNER JOIN tb_persons c USING(idperson)
			WHERE
			a.idrecovery = :idrecovery
			AND
			a.dtrecovery IS NULL
			AND
			DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();",
            array(
                ":idrecovery" => $idrecovery,
            ));

        if (count($results) === 0) {
            throw new \Exception("Não foi possível recuperar a senha.");
        } else {
            return $results[0];
        }

    }

    public static function setForgotUsed($idrecovery)
    {

        $sql = new Sql();

        $sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery", array(":idrecovery" => $idrecovery,
        ));

    }

    public function setPassword($password)
    {

        $sql = new Sql();

        $sql->query("UPDATE tb_users SET despassword = :despassword WHERE iduser = :iduser", array(
            "despassword" => $password,
            "iduser"      => $this->getiduser(),
        ));

    }
/*
public static function getError($msg){

$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

User::clearError();

return $msg;

}

public static function clearError(){

$_SESSION[User::ERROR] = NULL;
}

public static function setErrorRegister($msg){

$_SESSION[User::ERROR_REGISTER] = $msg;
}
 */
}
