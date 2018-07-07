<?php
/**
 * Created by PhpStorm.
 * User: aziz
 * Date: 7/7/18
 * Time: 3:27 PM
 */
namespace App\Database;

class Database
{
    public function GetCountry(){
        try{
            $countryArray = array();
            $db = new \PDO('mysql:host=localhost;dbname=tekbanx', "root", "aziz");
            $country = $db->query("SELECT * FROM `Country`");
            foreach ($country as $c){
                array_push($countryArray, array("name" => $c['name'],"annualInterestRate" => $c['annualInterestRate']));
            }
            return $countryArray;

        } catch (\PDOException $e) {
            print "Error !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
/*
 INSERT INTO `Country` (`id`, `name`, `annualInterestRate`) VALUES ('1', 'Canada', '10'), ('2', 'USA', '12'),('3', 'Mexico', '9'),('4', 'Brasil', '13');
 */
