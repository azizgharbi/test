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
    /**
     * Connect
     * @return Object
     */

    public static function Connect(){
        try{

            $configs = include('config.php');
            $pdo = new \PDO('mysql:host='.$configs["HOST"].';dbname='.$configs["DB"] , $configs["USER"], $configs["PASSWORD"]);
            return $pdo;
        } catch (\PDOException $e) {
            print "Error !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * Connect
     * @param $countriesID
     * @return array
     */

    public  static function GetCountry(array $countriesID) : array
    {
        $countryArray = [];
        $ids = join("','",$countriesID);
        $countries = self::Connect()->query("SELECT * FROM `Country` WHERE id IN ('$ids')");
            foreach ($countries as $country){
                array_push($countryArray, [
                    "name" => $country['name'],
                    "annualInterestRate" => $country['annualInterestRate']]
                );
            }
            return $countryArray;
    }
}
