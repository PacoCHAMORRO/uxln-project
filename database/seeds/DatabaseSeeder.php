<?php

use App\User;
use App\Institution;
use App\Collab;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Institution::truncate();
        Collab::truncate();

        $usersQuantity = 20;
        $institutionsQuantity = 40;
        $collabsQuantity = 200;

        factory(User::class, $usersQuantity)->create();
        factory(Institution::class, $institutionsQuantity)->create();
        factory(Collab::class, $collabsQuantity)->create();
    }
}
