<?php

namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Model;

class Person extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT *
            FROM tb_persons a
            INNER JOIN tb_addresses b ON a.idaddress = b.idaddress
            WHERE idperson > '1'"
        );

    }

    public function save()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_persons_save(:desperson, :destypedoc, :nrdocument, :desemitter, :desemail, :nrphone, :despublicplace, :nrnumber, :desregion, :descity, :desstate, :descountry, :descomplement)", array(
            ":desperson"      => $this->getdesperson(),
            ":destypedoc"     => $this->getdestypedoc(),
            ":nrdocument"     => $this->getnrdocument(),
            ":desemitter"     => $this->getdesemitter(),
            ":desemail"       => $this->getdesemail(),
            ":nrphone"        => $this->getnrphone(),
            ":despublicplace" => $this->getdespublicplace(),
            ":nrnumber"       => $this->getnrnumber(),
            ":desregion"      => $this->getdesregion(),
            ":descity"        => $this->getdescity(),
            ":desstate"       => $this->getdesstate(),
            ":descountry"     => $this->getdescountry(),
            ":descomplement"  => $this->getdescomplement(),
        ));

        $this->setData($results[0]);
    }

    public function get($idperson)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_persons WHERE idperson = :idperson", [
            ":idperson" => $idperson,
        ]);

        $this->setData($results[0]);
    }

    public function update()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_personsupdate_save(:idperson, :desperson, :destypedoc, :nrdocument, :desemitter, :desemail, :nrphone, :despublicplace, :nrnumber, :desregion, :descity, :desstate, :descountry, :descomplement)",
            array(
                ":idperson"       => $this->getidperson(),
                ":desperson"      => $this->getdesperson(),
                ":destypedoc"     => $this->getdestypedoc(),
                ":nrdocument"     => $this->getnrdocument(),
                ":desemitter"     => $this->getdesemitter(),
                ":desemail"       => $this->getdesemail(),
                ":nrphone"        => $this->getnrphone(),
                ":despublicplace" => $this->getdespublicplace(),
                ":nrnumber"       => $this->getnrnumber(),
                ":desregion"      => $this->getdesregion(),
                ":descity"        => $this->getdescity(),
                ":desstate"       => $this->getdesstate(),
                ":descountry"     => $this->getdescountry(),
                ":descomplement"  => $this->getdescomplement(),
            ));

        $this->setData($results[0]);
    }
    public function delete()
    {
        $sql = new Sql();

        $sql->query("DELETE FROM tb_persons WHERE idperson = :idperson", [
            ":idperson" => $this->getidperson(),
        ]);
    }

    public static function getPage($page = 1, $search = '', $itemsPerPage = 20)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        if ($search != '') {

            $results = $sql->select("
               SELECT SQL_CALC_FOUND_ROWS a.*, b.*
               FROM tb_persons a
               INNER JOIN tb_addresses b ON a.idaddress = b.idaddress
               WHERE a.idperson > '1' AND a.idperson LIKE :search OR a.desperson LIKE :search OR b.desaddress LIKE :search OR b.desnumber LIKE :search OR b.desregion LIKE :search
               ORDER BY a.idperson DESC
               LIMIT $start, $itemsPerPage;
               ", [
                ":search" => '%' . $search . '%',
            ]);

        } else {

            $results = $sql->select("
               SELECT SQL_CALC_FOUND_ROWS a.*, b.*
               FROM tb_persons a
               INNER JOIN tb_addresses b ON a.idaddress = b.idaddress
               WHERE a.idperson > '1'
               ORDER BY a.idperson DESC
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

}
