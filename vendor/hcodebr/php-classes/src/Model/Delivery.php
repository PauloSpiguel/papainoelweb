<?php

namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Model;

/**
 *
 */
class Delivery extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT a.*, b.deskid, b.dtbirthday, b.dessex, c.desperson, d.deslocal
			FROM tb_demands a
			INNER JOIN tb_kids b ON a.idkid = b.idkid
			INNER JOIN tb_persons c ON b.idperson = c.idperson
			INNER JOIN tb_locals d ON a.idlocal = d.idlocal
			ORDER BY a.dtpassword");
    }

    public function save()
    {

        /*if ($this->getdesaddress() == '') {

        $address = utf8_decode('Endereço não informado');

        } else {

        $address = $this->getdesaddress();
        }*/

        $sql = new Sql();

        $results = $sql->select("CALL sp_demands_save2 (:iddemand, :desaddress, :desnumber, :zipcode, :desregion, :descomplement, :descity, :desstate, :descountry, :desperson, :desemail, :nrphone, :nrcpf, :deskid, :dessex, :dtbirthday, :nrmatriculation, :nrpassword, :dtpassword, :desqrcode, :idlocal, :desobservation, :iduser)", array(
            ":iddemand"        => $this->getiddemand(),
            ":desaddress"      => $this->getdesaddress(),
            ":desnumber"       => $this->getdesnumber(),
            ":zipcode"         => $this->getzipcode(),
            ":desregion"       => $this->getdesregion(),
            ":descomplement"   => $this->getdescomplement(),
            ":descity"         => $this->getdescity(),
            ":desstate"        => $this->getdesstate(),
            ":descountry"      => $this->getdescountry(),
            ":desperson"       => $this->getdesperson(),
            ":desemail"        => $this->getdesemail(),
            ":nrphone"         => $this->getnrphone(),
            ":nrcpf"           => $this->getnrcpf(),
            ":deskid"          => $this->getdeskid(),
            ":dessex"          => $this->getdessex(),
            ":dtbirthday"      => $this->getdtbirthday(),
            ":nrmatriculation" => $this->getnrmatriculation(),
            ":nrpassword"      => $this->getnrpassword(),
            ":dtpassword"      => $this->getdtpassword(),
            ":desqrcode"       => $this->getdesqrcode(),
            ":idlocal"         => $this->getidlocal(),
            ":desobservation"  => $this->getdesobservation(),
            ":iduser"          => $this->getiduser(),
        ));

        $this->setData($results[0]);

    }
    public function get($iddemand)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT a.*, b.deskid, b.dtbirthday, b.dessex, b.nrmatriculation, c.desperson, c.nrphone, d.deslocal
		FROM tb_demands a
		INNER JOIN tb_kids b ON a.idkid = b.idkid
		INNER JOIN tb_persons c ON b.idperson = c.idperson
		INNER JOIN tb_locals d  ON a.idlocal = d.idlocal
		WHERE iddemand = :iddemand", [
            ":iddemand" => $iddemand,
        ]);

        $this->setData($results[0]);

    }

    public function delete()
    {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_demands WHERE iddemand = :iddemand", [
            ":iddemand" => $this->getiddemand(),
        ]);
    }

    public static function getPage($page = 1, $search = '', $itemsPerPage = 20)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        if ($search != '') {

            $results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS a.*, b.deskid, b.dtbirthday, b.dessex, c.desperson, d.deslocal
			FROM tb_demands a
			INNER JOIN tb_kids b ON a.idkid = b.idkid
			INNER JOIN tb_persons c ON b.idperson = c.idperson
			INNER JOIN tb_locals d  ON a.idlocal = d.idlocal
			WHERE b.deskid LIKE :search OR c.desperson LIKE :search OR b.dessex LIKE :search OR d.deslocal LIKE :search
			ORDER BY a.nrpassword DESC
			LIMIT $start, $itemsPerPage;
			", [
                ":search" => '%' . $search . '%',
            ]);

        } else {

            $results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS a.*, b.deskid, b.dtbirthday, b.dessex, c.desperson, d.deslocal
			FROM tb_demands a
			INNER JOIN tb_kids b ON a.idkid = b.idkid
			INNER JOIN tb_persons c ON b.idperson = c.idperson
			INNER JOIN tb_locals d  ON a.idlocal = d.idlocal
			ORDER BY a.nrpassword DESC
			LIMIT $start, $itemsPerPage;
			");

        }

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            "data"  => $results,
            "total" => (int) $resultTotal[0]["nrtotal"],
            "pages" => ceil($resultTotal[0]["nrtotal"] / $itemsPerPage),
        ];

    }

    public function dateW()
    {

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        //return strftime('%A, %d de %B de %Y', strtotime($date));
        return strftime('%A', strtotime($this->getdtpassword()));

    }

    public function qrCode()
    {

        return $this->getdtpassword();

    }

}
