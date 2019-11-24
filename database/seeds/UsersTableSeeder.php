<?php
# @Author: maerielbenedicto
# @Date:   2019-11-11T19:46:42+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-12T14:11:24+00:00




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
        factory(App\User::class, 10)->create()->each(function($user){
          $user->roles()->attach(Role::where('name','doctor')->first());
          factory(App\Doctor::class)->create(['user_id'=> $user->id]);
        });



        factory(App\User::class, 10)->create()->each(function($user){
          $user->roles()->attach(Role::where('name','patient')->first());
          factory(App\Patient::class)->create(['user_id'=> $user->id]);
        });



        // $roles = App\Role::all();
        //
        // App\User::all()->each(function ($user) use ($roles){
        //   $user->roles()->attach(
        //     $roles->random(1)
        //   );
        // });

        $role_admin = Role::where('name','admin')->first();
        $role_doctor = Role::where('name','doctor')->first();
        $role_patient = Role::where('name','patient')->first();

        $admin = new User();
        $admin->name = 'Maeriel B';
        $admin->email = 'admin@medcentre.ie';
        $admin->password = bcrypt('secret');
        $admin->address1 = rand(1, 100);
        $admin->address2 = "Main Street";
        $admin->city = 'Dun laoghaire';
        $admin->country = 'Ireland';
        $admin->phone_number = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
        $admin->save();

        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Karen C';
        $user->email = 'kc@medcentre.ie';
        $user->password = bcrypt('secret');
        $user->address1 = rand(1, 100);
        $user->address2 = "Main Street";
        $user->city = 'Dun laoghaire';
        $user->country = 'Ireland';
        $user->phone_number = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
        $user->save();

        $user->roles()->attach($role_doctor);

        $user = new User();
        $user->name = 'Zion B';
        $user->email = 'zb@medcentre.ie';
        $user->password = bcrypt('secret');
        $user->address1 = rand(1, 100);
        $user->address2 = "Main Street";
        $user->city = 'Dun laoghaire';
        $user->country = 'Ireland';
        $user->phone_number = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
        $user->save();

        $user->roles()->attach($role_patient);


    }

    //only accessible within users table seeder
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
