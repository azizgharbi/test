<?php

namespace App\Models;

use App\Database\Database as DB;

class Manager implements TestInterface
{
    /**
     * getAnnualInterestRatesByCountry
     * @return string
     */
    public function getAnnualInterestRateByCountry() : string
    {
        try {

            $Countries =  DB::GetCountry();
            return json_encode($Countries);

        } catch (\Exception $e) {
            $this->error(500, $e->getMessage());
        }
    }

    /**
     * getInterestsCountry
     * @param int $amount
     * @return string
     */
    public function getInterestsCountry(int $amount) : string
    {
        try{
            $Countries =  DB::GetCountry();
            $response = [];

            foreach ($Countries as $country) {
                $inter = ($amount * $country["annualInterestRate"] / 100) / 365 ;
                array_push($response, [ $country['name'] => $inter + $amount ]);
            }
            return json_encode($response);

        }catch (\Exception $e){
            $this->error(500,$e->getMessage());
        }

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