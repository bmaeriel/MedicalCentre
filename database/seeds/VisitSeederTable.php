<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;

class VisitSeederTable extends Seeder
{
  private $amntOfDoctors = 0;
  private $amntOfPatients = 0;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //count how many doctors/patients on the table
      $this->amntOfDoctors = Doctor::all()->count();
      $this->amntOfPatients = Patient::all()->count();
      // dd($this->amntOfDoctors);

      //create 20 visits
      factory(App\Visit::class, 20)->create([
        //assign random integer to doctor_id (amount of doctors)
        'doctor_id' => function(){
          return mt_rand(1, $this->amntOfDoctors);
        },
        //assign random integer to patient_id (amount of patients)
        'patient_id' => function(){
          return mt_rand(1, $this->amntOfPatients);
        }
      ]);

    }
}
