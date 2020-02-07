<?php


class BDD{
 
        
    public function __construc(){
        var_dump('instance BDD');
        
    }
    protected static $_instance = null; 

    static function getConnexion(){
    // var_dump('instance BDD');
    if(is_null(self::$_instance)){
        $user='root';
        $password='root';
        self::$_instance = new PDO('mysql:host=localhost;dbname=voiture',$user,$password);
    }


    return self::$_instance;


    }

    static function quote($param){

        return self::getConnexion()->quote($param);
    }

}