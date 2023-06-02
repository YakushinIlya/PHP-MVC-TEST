<?php

namespace App\system;

use \PDO;

class DB
{
    private static $ins     = null;
    private $db = null;

    private $DB_HOST = DB_host;
    private $DB_NAME = DB_name;
    private $DB_USER = DB_user;
    private $DB_PASS = DB_pass;
    
    public function __construct()
    {
        try {
            $this->db = new PDO(
                'mysql:host=' . $this->DB_HOST . ';dbname=' . $this->DB_NAME,
                $this->DB_USER,
                $this->DB_PASS
            );
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getIns(): object
    {
        if (self::$ins instanceof self) {
            return self::$ins;
        }

        return self::$ins = new self;
    }

    public function queryAssoc($sql)
    {
        $q = $this->db->query($sql);
        $q->execute();

        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryObj($sql)
    {
        $q = $this->db->query($sql);
        $q->execute();

        return $q->fetchObject();
    }

    public function query($sql)
    {
        return $this->db->query($sql);
    }

    public function db(): object
    {
        return $this->db;
    }

    final public function __destruct()
    {
        self::$ins = null;
    }
}
