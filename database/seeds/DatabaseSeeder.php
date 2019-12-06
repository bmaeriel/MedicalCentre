<?php
# @Author: maerielbenedicto
# @Date:   2019-08-27T22:26:48+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-19T00:45:49+00:00




use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VisitSeederTable::class);
    }
}
