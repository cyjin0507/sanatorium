<?php

namespace src\App;

class DB
{
    private static $db = null;

    private static function getDB()
    {
        if(is_null(self::$db)){
            self::$db = new \PDO("mysql:host=svc.gksl2.cloudtype.app:31999; dbname=hospital; charset=utf8mb4;", "root", "1jx7m2gld16fbdh");
        }

        return self::$db;
    }

    public static function execute($sql, $data = array())
	{
		$query = self::getDB()->prepare($sql);
		return $query->execute($data);
	}

	public static function fetch($sql, $data = array())
	{
		$query = self::getDB()->prepare($sql);
		$query->execute($data);
		return $query->fetch(\PDO::FETCH_OBJ);
	}

	public static function fetchAll($sql, $data = array())
	{
		$query = self::getDB()->prepare($sql);
		$query->execute($data);
		return $query->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function lastId()
	{
		return self::getDB()->lastInsertId();
	}
}