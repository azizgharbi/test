<?php
namespace App\Models;

interface TestInterface {

    /*
     * error
	 * Returns error code and message in JSON format
     * @param int $code
     * @param string $error
     * @return string
     */
    public function error(int $code, string $error): string;
}