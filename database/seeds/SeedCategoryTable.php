<?php

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use League\Csv\Reader;


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
        


        //$this->filename = base_path().'/database/csv/part_categories.csv';

        $csv = Reader::createFromPath(base_path().'/database/csv/part_categories.csv')
            ->setHeaderOffset(0);

        $sql = 'INSERT INTO categories (id, name, created_at) values (:id,:name, :created_at)';

        //by setting the header offset we index all records
        //with the header record and remove it from the iteration

        foreach ($csv as $record) {
            DB::statement($sql, [
                'id' => $record['id'],
                'name' => $record['name'],
                'created_at' => Carbon::now(),

            ]);

        }
        
    }
}
