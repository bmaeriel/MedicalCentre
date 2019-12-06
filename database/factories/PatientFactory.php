<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    //get random element between yes or no
    $medical_insurance = $faker->randomElement($array = array('Yes','No'));

    //set to null values
    $insurance_company = NULL;
    $policy_number = NULL;

    //if no
      if($medical_insurance == 'No'){
        return [
          //leave values to null
          'medical_insurance' => $medical_insurance,
          'insurance_company' => $insurance_company,
          'policy_number' => $policy_number
        ];
      }
      else {
        //if yes
        return [
          //get faker values
          'medical_insurance' => $medical_insurance,
          'insurance_company' => $faker->company,
          'policy_number' => $faker->isbn13 //unique
        ];
      }


});
