<?php

require_once 'bdd.php';
require_once 'main.php';
require_once 'events.php';
require_once 'agenda.php';


class People extends MainObjectBDD {

    protected $id;
    protected $name; 
    
    protected static $tableName='people';
    protected static $_authoriseUpdate = ['name'];

    
    public function getAllPeople($filters=[]){
        return People::findAll($filters) ;
    }


    public function getAllEvents($filters=[]){
        $bdd = BDD::getConnexion() ;
        $query = '';
        $res = $bdd->query($query) ;
        return $res->fetchAll(PDO::FETCH_CLASS, 'events');
    }

}