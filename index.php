<?php

use App\Models\Manager;
require 'vendor/autoload.php';

/*
 *  Comment this  if the debug option is on in your php.ini file
 */
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

/*
 *  run app
 */

$manager = new Manager();

//show countries
echo $manager->getAnnualInterestRateByCountry();
//show countries interests
echo $manager->getInterestsCountry(45);
