<?php

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class SeedCategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Category::truncate();
        
        /*
        $sql = 'INSERT INTO categories (id, name, created_at) values (:id, :name, :created_at)';

        for($i=0; $i<5; $i++) {
            DB::statement($sql, [
                'id' => $i,
                'name' => 'Baseplates '.$i,
                'created_at' => Carbon::now(),

            ]);
        }
        */
       
            /*   DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Baseplates',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Duplo, Quatro and Primo',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Bricks Wedged',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 11,
                'name' => 'Bricks',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 14,
                'name' => 'Plates',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 16,
                'name' => 'Windows and Doors',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            )
        ));*/
    }
}
