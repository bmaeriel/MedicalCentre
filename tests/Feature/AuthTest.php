<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Role;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

      /** @test */
      public function user_needs_to_be_logged_in_to_see_dashboard(){
        $response = $this->get('/home')->assertRedirect('/login');
      }

      /** @test */
      public function user_with_admin_role_can_access_admin_dashboard(){
        $user = factory(User::class)->create();
        $user->roles()->attach(Role::where('name','admin')->first());

        $this->actingAs($user);
        $response = $this->get('/admin/home')->assertOk();
      }

      /** @test */
      public function user_with_patient_role_can_access_patient_dashboard(){
        $user = factory(User::class)->create();
        $user->roles()->attach(Role::where('name','patient')->first());

        $this->actingAs($user);
        $response = $this->get('/patient/home')->assertOk();
      }

      /** @test */
      public function user_with_doctor_role_can_access_doctor_dashboard(){
        $user = factory(User::class)->create();
        $user->roles()->attach(Role::where('name','doctor')->first());

        $this->actingAs($user);
        $response = $this->get('/doctor/home')->assertOk();
      }


}
