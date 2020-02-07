<?php

// require_once 'people.php';
require_once("test.php");





// $people = new People(1);
// // $people->printColor() ;
// echo $people->getName();



$allCars =  People::findAll([
    'name'=>'ser'
]);echo '<pre>';
var_dump($allCars);
echo '</pre>';


// $people = 'people' ;

// $allPeople = People::getAllPeople($people);
// var_dump($allPeople) ;







// $events = 'events' ;

// $allEvents = Events::getAllEvents() ;
// var_dump($allEvents) ;


