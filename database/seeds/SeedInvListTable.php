<?php


use App\Models\Inventory_list;
use Illuminate\Database\Seeder;

class SeedInvListTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Inventory_list::truncate();
        
        factory(App\Models\Inventory_list::class, 6)->create();
    }
}
