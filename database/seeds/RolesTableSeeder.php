<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create(['name' => 'Admin']);
      Role::create(['name' => 'Editor']);
      Role::create(['name' => 'Writer']);
      Role::create(['name' => 'Viewer']);
      Role::create(['name' => 'Delete']);
    }
}
