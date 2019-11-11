<?php
# @Author: maerielbenedicto
# @Date:   2019-11-11T19:46:42+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-11T20:24:09+00:00




use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = Role::where('name','admin')->first();
        $role_doctor = Role::where('name','doctor')->first();
        $role_patient = Role::where('name','patient')->first();

        $admin = new User();
        $admin->name = 'Maeriel B';
        $admin->email = 'admin@medcentre.ie';
        $admin->password = bcrypt('secret');
        $admin->save();

        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Karen C';
        $user->email = 'kc@medcentre.ie';
        $user->password = bcrypt('secret');
        $user->save();

        $user->roles()->attach($role_doctor);

        $user = new User();
        $user->name = 'Zion B';
        $user->email = 'zb@medcentre.ie';
        $user->password = bcrypt('secret');
        $user->save();

        $user->roles()->attach($role_patient);
    }
}
