<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\Professor;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CareerTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);

        // $this->call(UsersTableSeeder::class);
        factory(App\Student::class)->times(70)->create();
        factory(App\Professor::class)->times(20)->create();

    }
}
