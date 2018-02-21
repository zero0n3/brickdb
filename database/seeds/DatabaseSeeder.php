<?php

use App\Models\Part;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory_list;
use App\Models\Inventory_x_user;
use App\Models\Location;
use App\Models\Moc_list;
use App\Models\Moc_x_user;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // 
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        User::truncate();
        Category::truncate();
        Color::truncate();
        Part::truncate();
        Inventory_list::truncate();
        Moc_list::truncate();
        Inventory_x_user::truncate();
        Moc_x_user::truncate();
        Location::truncate();


        //
        $this->call(SeedUserTable::class);
        $this->call(SeedCategoryTable::class);
        $this->call(SeedColorTable::class);
        $this->call(SeedPartTable::class);
        $this->call(SeedInvListTable::class);
        $this->call(SeedMocListTable::class);
        $this->call(SeedInvXUserTable::class);
        $this->call(SeedMocXUserTable::class);
        $this->call(SeedLocationTable::class);
    }
}
