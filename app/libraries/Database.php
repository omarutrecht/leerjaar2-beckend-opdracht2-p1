<?php

class Database
{
    private $dbHandler;
    private $statement;

    public function __construct()
    {
        $conn = 'mysql:host=' . DB_HOST . ';dbname='. DB_NAME . ';charset=UTF8';

        try {
            $this->dbHandler = new PDO($conn, DB_USER, DB_PASS);

            if ($this->dbHandler) {
                // echo "Verbinding met de database is gelukt";
            } else {
                echo "Interne server-error";
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    public function resultSet()
    {
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single() {

        $this->statement->execute();

        return $this->statement->fetch(PDO::FETCH_OBJ);

    }
 

    public function bind($parameter, $value, $type = null)

    {

        if (is_null($type)) {

            switch($value) {

                case is_int($value):

                    $type = PDO::PARAM_INT;

                    break;

                case is_bool($value):

                    $type = PDO::PARAM_BOOL;

                    break;

                case is_null($value):

                    $type = PDO::PARAM_NULL;

                    break;

                default:

                    $type = PDO::PARAM_STR;

            }

        }        

        $this->statement->bindValue($parameter, $value, $type);

    }

}