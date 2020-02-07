<?php

require_once("bdd.php");


class People
{
    /** 
     * nom
     * @var null
    */

    protected  $name ;


    /**
    * id unique
    * @var null
    */
    protected  $id = null;


     /** 
     *voiture constructor 
     * @param $id
     */ 

    public function __construct($id)
    {
    //requete BDD recupere get propertiesfor $id
    
    $db = BDD::getConnexion();

    $inst = $db->query('SELECT * FROM listeagenda.people WHERE id='.$id);


    $result = $inst->fetch(PDO::FETCH_ASSOC);

    // $result = [ 

    //     'id'=>$id,
    //     'color'=>'blue',
    //     'nbDoors'=>3,
    //     'imat'=>'DG 564 YS',
    // ];
    $this->name = $result['name'];
    $this->id = $result['id'];

    }


    public function printId(){
        echo $this->id;
    }

    public function getId(){
       return $this->id;
    }


    public function printName(){
        echo $this->name;
    }

    public function getName(){
       return $this->name;
    }


    //relier a save


    public function changeImat($name){
        $this->name = $update('name',$imat);

        return $this->__save();
    }


        // $bdd = BDD::getConnexion();
        // $query = 'UPDATE voiture.listeVoiture
        // SET imat="'.$this->imat.'"
        // WHERE id='.$this->id;
    
        // $resa = $bdd->query($query);
    
    
        // // return ($this->color == $color);
        // if($resa->rowCount()){
        //     return true;
    
    
        // }
        // else{
        //     return false;
        // }
    
        // }
    
    
    //relier a save

    public function paint($id){


    $this->id = $id;
    // $this->color = $update('colr',$color);

        return $this->__save();
    }

//     $bdd = BDD::getConnexion();
//     $query = 'UPDATE voiture.listeVoiture
//     SET color="'.$this->color.'"
//     WHERE id='.$this->id;

//     $res = $bdd->query($query);


//     // return ($this->color == $color);
//     if($res->rowCount()){
//         return true;


//     }
//     else{
//         return false;
//     }

//  }

//fonction sauvegarder color et immat


    public function update($property, $value){

        $properties = array_keys(get_object_vars($this));
        if(in_array($property, $properties)){
            $this->$property = $value;

        }

        $this->__save();


        }
    

    protected function __save(){


        $bdd = BDD::getConnexion();


        $update = [];


        $properties = array_keys(get_object_vars($this));
        for ($i = 0; $i < count($properties); $i++){
            if($properties[$i] == 'id'){
                continue;
            }
         
            $property = $properties[$i];
             var_dump($properties[$i]);
             $update[] = $property.'="'.$this->{$properties[$i]}.'"';
        }


        var_dump($update);


        if(empty($update))
        return false;


        $query = 'UPDATE listeagenda.people
        SET '.implode(',',$update).'
        WHERE id='.$this->id;
        var_dump($query);
        // die;

        $res = $bdd->query($query);

        return !!($res && $res->rowCount());

    }

    
    public static function findAll($filters=[]){        
        $bdd = BDD::getConnexion();

//$k est égale à la clé de ta valeur et $f est égale à la valeur de ta clé// 
        $clauses=[];
        foreach($filters as $k => $f) {
            $clauses[] = $k.'='.$bdd->quote($f);
        }
        $where = '';
        if(!empty($clauses)) {
            $where = ' WHERE '.implode(' AND ', $clauses);
        }

        $query = 'SELECT * FROM listeagenda.people'.$where;
        var_dump($query);
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, 'People');

    }


}



