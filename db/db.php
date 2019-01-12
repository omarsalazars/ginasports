<?php
class Connection{
    public static function createConnection(){
        try {
            $db=new PDO('mysql:host=localhost; dbname=ginasports;', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET utf8");
            return $db;
        } catch (Exception $e) {
            echo $e;
        }        
    }
}