<?php

use App\Models\Inventory_x_user;
use Illuminate\Database\Seeder;

class SeedInvXUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventory_x_user::truncate();
        
        factory(App\Models\Inventory_x_user::class, 6)->create();
    }
}
