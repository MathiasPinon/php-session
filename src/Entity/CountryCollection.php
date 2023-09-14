<?php

declare(strict_types=1);

namespace src\Entity;

use Database\MyPdo;

class CountryCollection
{
    public static function findAll(): array|false
    {
        $sql = MyPdo::getInstance()->prepare(
            <<<SQL
            SELECT id , code , name 
            FROM country 
            ORDER BY name 
SQL
        );

        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_CLASS, Country::class);
    }
}
