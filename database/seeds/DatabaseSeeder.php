<?php

use App\Models\Category;
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
        
        //User::truncate();
        

        //$this->call(SeedCategoriesTable::class);
        //
        $this->call(SeedUserTable::class);
        $this->call(SeedCategoryTable::class);
    }
}
