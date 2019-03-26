<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = App\Role::whereName('Admin')->first();
        $user  = factory('App\User')->create([
          'name' => 'Admin',
          'email' => 'report-system@admin.com',
          'password'=>'123456'
        ]);
        $user->assignRoles($roles->id);
    }
}
