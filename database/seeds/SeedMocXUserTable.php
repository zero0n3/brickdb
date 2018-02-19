<?php

use App\Models\Moc_x_user;
use Illuminate\Database\Seeder;

class SeedMocXUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Moc_x_user::truncate();
        
        //factory(App\Models\Moc_x_user::class, 6)->create();
    }
}
