<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    $medical_insurance = $faker->randomElement($array = array('Yes','No'));
    $insurance_company = NULL;
    $policy_number = NULL;

      if($medical_insurance == 'No'){
        return [
          'medical_insurance' => $medical_insurance,
          'insurance_company' => $insurance_company,
          'policy_number' => $policy_number
        ];
      }
      else {
        return [
          'medical_insurance' => $medical_insurance,
          'insurance_company' => $faker->company,
          'policy_number' => $faker->isbn13
        ];
      }


});
