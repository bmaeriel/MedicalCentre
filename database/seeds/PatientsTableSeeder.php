<?php
# @Author: maerielbenedicto
# @Date:   2019-11-17T22:52:43+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-18T00:59:20+00:00




use Illuminate\Database\Seeder;
use App\Role;
use App\Patient;
use App\User;


class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    }

    //only accessible within customer table seeder
    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
      $pieces = [];
      $max = mb_strlen($keyspace, '8bit') - 1;
      for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
      }
        return implode('', $pieces);
    }
}
