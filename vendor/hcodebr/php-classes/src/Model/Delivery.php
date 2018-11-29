<?php

namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Model;
use \NewTech\Mailer;

/**
 *
 */
class local extends Model
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
