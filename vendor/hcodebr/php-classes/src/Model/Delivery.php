<?php

namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Model;
use \NewTech\Mailer;

/**
 *
 */
class Delivery extends Model
{
	
	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_demands a 
		JOIN tb_kids b
		ON a.idkid = b.idkid
		JOIN tb_persons c
		ON b.idperson = c.idperson
		JOIN tb_locals d
		ON a.idlocal = d.idlocal
		ORDER BY a.dtregister");
	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_locals_save(:idlocal, :deslocal)", array(
			":idlocal" => $this->getidlocal(),
			":deslocal" => $this->getdeslocal()
		));

		$this->setData($results[0]);

	}

	public function get($idlocal){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_locals WHERE idlocal = :idlocal", [
			":idlocal" => $idlocal
		]);

		$this->setdata($results[0]);

	}

	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM tb_locals WHERE idlocal = :idlocal", [
			":idlocal" => $this->getidlocal()
		]);
	}

}
