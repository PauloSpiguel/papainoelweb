<?php

namespace NewTech\Model;

use \NewTech\DB\Sql;
use \NewTech\Model;
use \NewTech\Mailer;
use \NewTech\Model\User;

/**
 *
 */
class Delivery extends Model
{
	
	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT a.*, b.deskid, b.dtbirthday, b.dessex, c.desperson, d.deslocal FROM tb_demands a INNER JOIN tb_kids b ON a.idkid = b.idkid INNER JOIN tb_persons c ON b.idperson = c.idperson INNER JOIN tb_locals d	ON a.idlocal = d.idlocal
			ORDER BY a.dtregister");
	}

	/*public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_demands_save(:iddemand, :deskid, :dessex, :dtbirthday, :nrmatriculation, :desperson, :desemail, :nrphone, :nrcpf, :nrpassword, :dtpassword, :desqrcode, :idlocal, :desobservation, :iduser)", array(
			":iddemand" => $this->getiddemand(),
			":deskid" => $this->getdeskid(),
			":dessex" => $this->getdessex(),
			":dtbirthday" => $this->getdtbirthday(),
			":nrmatriculation" => $this->getnrmatriculation(),
			":desperson" => $this->getdesperson(),
			":desemail" => $this->getdesemail(),
			":nrphone" => $this->getnrphone(),
			":nrcpf" => $this->getnrcpf(),
			":nrpassword" => $this->getnrpassword(),
			":dtpassword" => $this->getdtpassword(),
			":desqrcode" => 'QRCODE',
			":idlocal" => $this->getidlocal(),
			":desobservation" =>$this->getdesobservation(),
			":iduser" =>'2'

		));

		$this->setData($results[0]);

	}

	public function get($iddemand){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_demands WHERE iddemand = :iddemand", [
			":iddemand" => $iddemand
		]);

		$this->setData($results[0]);

	}*/

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_demands_save2 (:iddemand, :desperson, :idkid, :nrpassword, :dtpassword, :desqrcode, :idlocal, :desobservation, :iduser)", array(
			":iddemand" => $this->getiddemand(),
			":desperson" => $this->getdesperson(),
			":idkid" => $this->getidkid(),
			":nrpassword" => $this->getnrpassword(),
			":dtpassword" => $this->getdtpassword(),
			":desqrcode" => 'QRCODE',
			":idlocal" => $this->getidlocal(),
			":desobservation" => $this->getdesobservation(),
			":iduser" => $this->getiduser()
		));


		$this->setData($results[0]);

	}


	public function get($iddemand){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_demands WHERE iddemand = :iddemand", [
			":iddemand" => $iddemand
		]);

		$this->setData($results[0]);

	}

	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM tb_demands WHERE iddemand = :iddemand", [
			":iddemand" => $this->getiddemand()
		]);
	}

}

?>
