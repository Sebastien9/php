<?php

require_once 'bdd.php';
require_once 'main.php';
require_once 'agenda.php';


class Events extends MainObjectBDD {


    protected $id;
    protected $title;
    protected $idagenda;
    protected $datetime;
    protected $duration;

    protected static $tableName='categorie'; 
    protected static $_authoriseUpdate = ['title', 'idagenda','datetime','duration'];
    
    public function getAllPost($filters=[]){
        $bdd = BDD::getConnexion() ;
        $query = 'SELECT agenda.* FROM agenda INNER JOIN eventpeople ON agenda.id=eventpeople.idevent WHERE idCategorie='.$this->id ;
        $res = $bdd->query($query) ;
        return $res->fetchAll(PDO::FETCH_CLASS, 'agenda');
    }
    
    public static function findOne($filters=[]) {
            
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses = [];
        foreach ($filters as $k => $filter) {
            $clauses[] = $k.'='.$bdd->quote($filter) ;
        }
        if (!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.static::$tableName.' as c INNER JOIN eventpeople as cp ON c.id=cp.idCategorie '.$where ;
        $res = $bdd->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $res->fetch();
    }


    public static function findAll($filters=[]) {
            
        $bdd = BDD::getConnexion();
        $where = '';
        $clauses = [];
        foreach ($filters as $k => $filter) {
            $clauses[] = $k.'='.$bdd->quote($filter) ;
        }
        if (!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }
        $query = 'SELECT * FROM '.static::$tableName.' as c INNER JOIN eventpeople as cp ON c.id=cp.idCategorie '.$where ;
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }
}