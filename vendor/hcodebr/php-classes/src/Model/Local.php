<?php

namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Model;

/**
 *
 */
class Local extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_locals ORDER BY deslocal");
    }

    public function save()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_locals_save(:idlocal, :deslocal)", array(
            ":idlocal"  => $this->getidlocal(),
            ":deslocal" => utf8_decode($this->getdeslocal()),
        ));

        $this->setData($results[0]);

    }

    public function get($idlocal)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_locals WHERE idlocal = :idlocal", [
            ":idlocal" => $idlocal,
        ]);

        $this->setdata($results[0]);

    }

    public function delete()
    {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_locals WHERE idlocal = :idlocal", [
            ":idlocal" => $this->getidlocal(),
        ]);
    }

    public static function CountLocal($deslocal)
    {

        $sql = new Sql();

        $result = $sql->select("SELECT COUNT(deslocal) AS nrTotal FROM tb_demands a
			INNER JOIN tb_locals b ON a.idlocal = b.idlocal
			WHERE deslocal = :deslocal", [
            ":deslocal" => $deslocal,
        ]);

        return $result;

    }

}
