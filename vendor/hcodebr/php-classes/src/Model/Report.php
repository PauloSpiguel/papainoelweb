<?php

namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Model;

/**
 *
 */
class Report extends Model
{

    public static function countDelivery()
    {
        $sql = new Sql();

        $count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_demands;");

        if (count($count) > 0) {
            return $count[0]['nrtotal'];
        }
    }

    public static function countKidsFemale()
    {
        $sql = new Sql();

        $count = $sql->select("SELECT COUNT(*) AS nrCount
								FROM tb_demands a
								INNER JOIN tb_kids b ON a.idkid = b.idkid
								WHERE dessex = '1';");

        if (count($count) > 0) {
            return $count[0]['nrCount'];
        }
    }

    public static function countKidsMale()
    {
        $sql = new Sql();

        $count = $sql->select("SELECT COUNT(*) AS nrCount
								FROM tb_demands a
								INNER JOIN tb_kids b ON a.idkid = b.idkid
								WHERE dessex = '2';");

        if (count($count) > 0) {
            return $count[0]['nrCount'];
        }
    }

}
