<?php

namespace App\Models;

use App\Database\Database as DB;

class Manager implements TestInterface
{
    /**
     * getAnnualInterestRatesByCountry
     * @param $countryID
     * @return string
     */
    public function getAnnualInterestRateByCountry(array $countryID) : string
    {
        try {

            $Countries =  DB::GetCountry($countryID);
            return json_encode($Countries);

        } catch (\Exception $e) {
            $this->error($e->getCode(), $e->getMessage());
        }
    }

    /**
     * getInterestsCountry
     * @param int $amount
     * @param array $countryIds
     * @return string
     */
    public function getInterestsCountry(int $amount  , array $countryIds) : string
    {
        try{
            $Countries =  DB::GetCountry($countryIds);
            $response = [];

            foreach ($Countries as $country) {
                $inter = ($amount * $country["annualInterestRate"] / 100) / 365 ;
                array_push($response, [ $country['name'] => $inter + $amount ]);
            }
            return json_encode($response);

        }catch (\Exception $e){
            $this->error($e->getCode(),$e->getMessage());
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