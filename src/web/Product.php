<?php


// Класс для вывода и добавления позиций в нашу БД

class Product
{

    public $id;
    public $name;

    public function getProduct()
    {

    }

    public static function getById($id)
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty');
        $sql = "SELECT id, FROM products where id = :id";
        $st = $connection->prepare($sql);
        $st->bindValue(":id", $id, \PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        $connection = null;
        return new Product($row);
    }

    public static function getAll()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT name FROM products ";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;

    }


    public static function getAllLiquidDisplay()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id WHERE 
        ((groups.id_parent = 3) OR 
         (products.id_group = 3))";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function getAllPlasmaDisplay()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id WHERE 
        ((groups.id_parent = 4) OR 
         (products.id_group = 4))";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }


    public static function getAllLiquidDisplayTVDiagLess40()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id WHERE 
        ((groups.id_parent = 3) AND 
         (products.id_group = 5))";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function getAllLiquidDisplayTVDiagMore40()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id WHERE 
        ((groups.id_parent = 3) AND 
         (products.id_group = 6))";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function getAllPlasmaDisplayTVDiagLess40()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id WHERE 
        ((groups.id_parent = 4) AND 
         (products.id_group = 7))";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }


    public static function getAllPlasmaDisplayTVDiagMore40()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id WHERE 
        ((groups.id_parent = 4) AND 
         (products.id_group = 8))";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }



    public static function getCountTv()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT id_group FROM products where id_group NOT IN (2,9,10) ";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function getCountMulti()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT * FROM products where id_group IN (2,9,10) ";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function getCountLiquidDisplay()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id WHERE 
        ((groups.id_parent = 3) OR 
         (products.id_group = 3))";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return count($row);
    }

    public static function getCountPlasmaDisplay()
    {
        $connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id WHERE 
        ((groups.id_parent = 4) OR 
         (products.id_group = 4))";
        $st = $connection->prepare($sql);
        $st->execute();
        $row = $st->fetchAll(\PDO::FETCH_ASSOC);
        return count($row);
    }


}