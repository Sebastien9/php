<?php

require_once 'bdd.php';
require_once 'main.php';
require_once 'events.php';
require_once 'people.php';
 
class Agenda extends MainObjectBDD {
    
    protected $color = null;
    protected $name = null;
    protected $id = null;
    
    public static $tableName='agenda';
    public static $_authoriseUpdate=['color', 'name', 'id'];



    public function __construct($id=null) {
        parent::__construct($id) ;
        $this->event = Events::findAll(['id'=>$this->id]);
        $this->people = new People($this->idpeople) ;
    }


}

