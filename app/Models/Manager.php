<?php

namespace App\Models;

use App\Database\Database;

class Manager implements TestInterface
{
    /**
     * getAnnualInterestRatesByCountry
     * @return string
     */
    public function getAnnualInterestRateByCountry() : string {
        $db = new Database();
        $Countries =  $db->GetCountry();
        return json_encode($Countries);
    }
    /**
     * getInterestsCountry
     * @return string
     */
    public function getInterestsCountry( $amount) : string {
        $db = new Database();
        $Countries =  $db->GetCountry();
        $response = [];
        foreach ($Countries as $country) {
            $inter = ($amount * $country["annualInterestRate"] / 100) / 365 ;
            array_push($response, array( $country['name'] => $inter + $amount ));
        }
        return json_encode($response);
    }

    /**
     * returnError
     * @param int $code
     * @param string $error
     * @return string
     */
    public function error(int $code, string $error): string{
        return json_encode([$code => $error]);
    }
}