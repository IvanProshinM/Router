<?php


class ProductRepository
{
    /** @var PDO */
    public $connection;

    public function __construct()
    {
        $this->connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }

    public function findAll(ProductFilter $filter)
    {
        $where = [];
        if ($filter->getGroupId() !== null) {
            $where[] = sprintf("groups.id_parent = %d", $filter->getParentId());
        }
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id";
        if (count($where)) {
            $sql .= " WHERE " . implode(' AND ', $where);
        }


       if ($filter->getParentId() !== null) {
            $where[] = sprintf("products.id_group = %d", $filter->getGroupId());
        }
        $sql = "SELECT products.name, id_group FROM products JOIN groups ON id_group = groups.id";
        if (count($where)) {
            $sql .= " WHERE " . implode(' AND ', $where);
        }





        $st = $this->connection->prepare($sql);
        $st->execute();
        return $st->fetchAll(\PDO::FETCH_ASSOC);
    }

}

