<?php

use App\Bookable;
use Illuminate\Database\Seeder;

class BookablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create methodはmodelの作成と共にdbへの保存を行う、make methodは作成のみで保存は行わない
        factory(Bookable::class, 100)->create();
    }
}
