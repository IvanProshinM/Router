<?php

class GroupRepository
{

    public $connection;

    public function __construct()
    {
        $this->connection = new \PDO('mysql:dbname=mailsender;host=mariadb', 'mailsender', 'qwerty', [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }


    public function findALlCategory(GroupFilter $filter)
    {

        $where = [];
        if ($filter->getCategoryId() !== null) {
            $where[] = sprintf('groups.id = %d', $filter->getCategoryId());
        }
        $sql = "SELECT groups.id, groups.name FROM groups JOIN products ON groups.id = id_group";
        if (count($where)) {
            $sql .= " WHERE " . implode(' AND ', $where);
        }

        if ($filter->getParentId() !== null) {
            $where[] = sprintf('groups.id_parent = %d', $filter->getParentId());
        }
        $sql = "SELECT groups.id, groups.name FROM groups JOIN products ON groups.id = id_group";
        if (count($where)) {
            $sql .= " WHERE " . implode(' AND ', $where);
        }

        $st = $this->connection->prepare($sql);
        $st->execute();
        return $st->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCategoryList($categoryName)
    {

        $sql = "SELECT id, name FROM `groups` WHERE name = '$categoryName'";
        $st = $this->connection->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        if ($result[0]["id"] !== null) {
            $sql = "SELECT id, name FROM `groups` WHERE id_parent = " . $result[0]["id"];
            $st = $this->connection->prepare($sql);
            $st->execute();
            $result = $st->fetchAll();
            if ($result[0]["id"] !== null) {
                $sql = "SELECT id, name FROM `groups` WHERE id_parent = " . $result[0]["id"];
                $st = $this->connection->prepare($sql);
                $st->execute();
            }
        }
        return $st->fetchAll((\PDO::FETCH_ASSOC));
    }
}