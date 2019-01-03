<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Schema::disableForeignKeyConstraints();
      Student::truncate();
      Schema::enableForeignKeyConstraints();

      // $faker = Faker\Factory::create();

      // for ($i=0; $i < 100; $i++) { 
      //   $st = new Student([
      //     "first_name" => $faker->firstName(),
      //     "last_name" => $faker->lastName(),
      //     "email" => $faker->unique()->safeEmail()
      //   ]);
      //   $st->save();
      // }

      factory(Student::class, 25)->create();
    }
}
