<?php

/*use App\Models\Part;
use App\Models\Category;
use App\Models\Color;
use App\User;*/
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


        //
        $this->call(SeedUserTable::class);
        $this->call(SeedCategoryTable::class);
        $this->call(SeedColorTable::class);
        $this->call(SeedPartTable::class);
        $this->call(SeedInvListTable::class);
        $this->call(SeedMocListTable::class);
        $this->call(SeedInvListTable::class);
        $this->call(SeedMocListTable::class);
        $this->call(SeedInvXUserTable::class);
        $this->call(SeedMocXUserTable::class);
        $this->call(SeedLocationTable::class);
    }
}
