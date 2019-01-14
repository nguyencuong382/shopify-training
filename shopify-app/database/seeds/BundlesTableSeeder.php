<?php

use Illuminate\Database\Seeder;

class BundlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Schema::disableForeignKeyConstraints();
      App\Bundles::truncate();
      Schema::enableForeignKeyConstraints();
      factory(App\Bundles::class, 10)->create();
    }
}
