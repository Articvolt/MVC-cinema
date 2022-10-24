<?php

// permet d'éviter les conflits entre différents éléments de même nom (classe / fonction / constantes).
namespace Model;

abstract class Connect {

    const HOST = "localhost";
    const DB = "cinema_ugo";
    const USER = "root";
    const PASS = "";

    public static function seConnecter() {
        try {
            return new \PDO (
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8",self::USER, self::PASS);
        } catch(\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}