<?php

use App\Models\Moc_list;
use Illuminate\Database\Seeder;

class SeedMocListTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Moc_list::truncate();
        
        factory(App\Models\Moc_list::class, 6)->create();
    }
}
