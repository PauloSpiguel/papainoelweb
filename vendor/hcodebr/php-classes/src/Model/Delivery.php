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

        $data = $sql->select("SELECT a.*, b.deskid, b.dtbirthday, b.dessex, c.desperson, d.deslocal, e.deslogin
         FROM tb_demands a
         INNER JOIN tb_kids b ON a.idkid = b.idkid
         INNER JOIN tb_persons c ON b.idperson = c.idperson
         INNER JOIN tb_locals d ON a.idlocal = d.idlocal
         INNER JOIN tb_users e ON a.iduser = e.iduser
         ORDER BY a.dtpassword");

        return utf8_encode($data);

    }

    public function save()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_demands_save (:iddemand, :desaddress, :desnumber, :zipcode, :desregion, :descomplement, :descity, :desstate, :descountry, :desperson, :desemail, :nrphone, :nrcpf, :deskid, :dessex, :dtbirthday, :nrmatriculation, :nrpassword, :dtpassword, :desqrcode, :idlocal, :desobservation, :iduser)", array(
            ":iddemand"        => $this->getiddemand(),
            ":desaddress"      => utf8_decode($this->getdesaddress()),
            ":desnumber"       => $this->getdesnumber(),
            ":zipcode"         => $this->getzipcode(),
            ":desregion"       => utf8_decode($this->getdesregion()),
            ":descomplement"   => utf8_decode($this->getdescomplement()),
            ":descity"         => utf8_decode($this->getdescity()),
            ":desstate"        => $this->getdesstate(),
            ":descountry"      => utf8_decode($this->getdescountry()),
            ":desperson"       => utf8_decode($this->getdesperson()),
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
            ":desobservation"  => utf8_decode($this->getdesobservation()),
            ":iduser"          => $this->getiduser(),
        ));

        $this->setData($results[0]);

    }
    public function get($iddemand)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT a.*, b.deskid, b.dtbirthday, b.dessex, b.nrmatriculation, c.*, d.deslocal, e.*
        FROM tb_demands a
        INNER JOIN tb_kids b ON a.idkid = b.idkid
        INNER JOIN tb_persons c ON b.idperson = c.idperson
        INNER JOIN tb_locals d  ON a.idlocal = d.idlocal
        INNER JOIN tb_addresses e ON c.idaddress = e.idaddress
        WHERE iddemand = :iddemand", [
            ":iddemand" => $iddemand,
        ]);

        $this->setData($results[0]);

    }

    public function update()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_demandsupdate_save (:iddemand, :desaddress, :desnumber, :zipcode, :desregion, :descomplement, :descity, :desstate, :descountry, :desperson, :desemail, :nrphone, :nrcpf, :deskid, :dessex, :dtbirthday, :nrmatriculation, :dtpassword, :idlocal, :desobservation)", array(
            ":iddemand"        => $this->getiddemand(),
            ":desaddress"      => utf8_decode($this->getdesaddress()),
            ":desnumber"       => $this->getdesnumber(),
            ":zipcode"         => $this->getzipcode(),
            ":desregion"       => utf8_decode($this->getdesregion()),
            ":descomplement"   => utf8_decode($this->getdescomplement()),
            ":descity"         => utf8_decode($this->getdescity()),
            ":desstate"        => utf8_decode($this->getdesstate()),
            ":descountry"      => utf8_decode($this->getdescountry()),
            ":desperson"       => utf8_decode($this->getdesperson()),
            ":desemail"        => $this->getdesemail(),
            ":nrphone"         => $this->getnrphone(),
            ":nrcpf"           => $this->getnrcpf(),
            ":deskid"          => $this->getdeskid(),
            ":dessex"          => $this->getdessex(),
            ":dtbirthday"      => $this->getdtbirthday(),
            ":nrmatriculation" => $this->getnrmatriculation(),
            ":dtpassword"      => $this->getdtpassword(),
            ":idlocal"         => $this->getidlocal(),
            ":desobservation"  => utf8_decode($this->getdesobservation()),

        ));

        $this->setData($results[0]);

    }

    public function delete()
    {

        $sql = new Sql();

        $sql->query("CALL sp_demands_delete(:iddemand)", array(
            ":iddemand" => $this->getiddemand(),
        ));
    }

    public static function getPage($page = 1, $search = '', $itemsPerPage = 20)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        if ($search != '') {

            $results = $sql->select("
         SELECT SQL_CALC_FOUND_ROWS a.*, b.deskid, b.dtbirthday, b.dessex, c.desperson, d.deslocal, e.deslogin
         FROM tb_demands a
         INNER JOIN tb_kids b ON a.idkid = b.idkid
         INNER JOIN tb_persons c ON b.idperson = c.idperson
         INNER JOIN tb_locals d  ON a.idlocal = d.idlocal
         INNER JOIN tb_users e ON a.iduser = e.iduser
         WHERE a.nrpassword LIKE :search OR b.deskid LIKE :search OR c.desperson LIKE :search OR b.dessex LIKE :search OR d.deslocal LIKE :search
         ORDER BY a.nrpassword DESC
         LIMIT $start, $itemsPerPage;
         ", [
                ":search" => '%' . $search . '%',
            ]);

        } else {

            $results = $sql->select("
         SELECT SQL_CALC_FOUND_ROWS a.*, b.deskid, b.dtbirthday, b.dessex, c.desperson, d.deslocal, e.deslogin
         FROM tb_demands a
         INNER JOIN tb_kids b ON a.idkid = b.idkid
         INNER JOIN tb_persons c ON b.idperson = c.idperson
         INNER JOIN tb_locals d  ON a.idlocal = d.idlocal
         INNER JOIN tb_users e ON a.iduser = e.iduser
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
        //return strftime('%A, %d de %B de %Y', strtotime($date));
        $dayWeek = strftime('%A', strtotime($this->getdtpassword()));

        return utf8_encode($dayWeek);
    }

    public function qrCode()
    {

        return $this->getdtpassword();

    }

}
