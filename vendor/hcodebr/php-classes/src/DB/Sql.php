<?php

namespace NewTech\DB;

require_once "Secret.php";

class Sql
{

    private $conn;

    public function __construct()
    {

        $timezone = "America/Sao_Paulo";
        $fuso     = '-02:00';

        $this->conn = new \PDO(
            "mysql:dbname=" . DBNAME . ";host=" . HOSTNAME,
            USERNAME, PASSWORD
        );

        $this->conn->exec("SET time_zone = '{$timezone}'");
        $this->conn->exec("SET TIME_ZONE = '{$fuso}'");
        $this->conn->exec("SET NAMES utf8");

    }

    private function setParams($statement, $parameters = array())
    {

        foreach ($parameters as $key => $value) {

            $this->bindParam($statement, $key, $value);

        }

    }

    private function bindParam($statement, $key, $value)
    {

        $statement->bindParam($key, $value);

    }

    public function query($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

    }

    public function select($rawQuery, $params = array()): array
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}
