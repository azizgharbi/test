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
    public static function GetCountry(){

        try{

            $countryArray = array();
            $configs = include('config.php');

            $db = new \PDO('mysql:host='.$configs["HOST"].';dbname='.$configs["DB"] , $configs["USER"], $configs["PASSWORD"]);
            $countries = $db->query("SELECT * FROM `Country`");

            foreach ($countries as $country){
                array_push($countryArray, [
                    "name" => $country['name'],
                    "annualInterestRate" => $country['annualInterestRate']]
                );
            }
            return $countryArray;

        } catch (\PDOException $e) {
            print "Error !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
