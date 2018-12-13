<?php

namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Model;
use \NewTech\Mailer;

/**
 *
 */
class Report extends Model
{

	public static function countDelivery()
	{ 
		$sql = new Sql();

		$count = $sql->select("SELECT COUNT(*) AS nrtotal FROM tb_kids;");
		
		if (count($count) > 0) {
			return $count[0]['nrtotal'];
		}
	}

	public static function countKidsFemale()
	{ 
		$sql = new Sql();

		$count = $sql->select("SELECT COUNT(*) AS nrCount FROM tb_kids WHERE dessex = '1'");

		if (count($count) > 0) {
			return $count[0]['nrCount'];
		}
	}

	public static function countKidsMale()
	{ 
		$sql = new Sql();

		$count = $sql->select("SELECT COUNT(*) AS nrCount FROM tb_kids WHERE dessex = '2'");

		if (count($count) > 0) {
			return $count[0]['nrCount'];
		}
	}

}

