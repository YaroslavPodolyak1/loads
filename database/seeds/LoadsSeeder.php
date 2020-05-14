<?php

use Illuminate\Database\Seeder;

class LoadsSeeder extends Seeder
{
    public function run(): void
    {
        factory(\App\Models\Load::class, 5)->create();
    }
}
