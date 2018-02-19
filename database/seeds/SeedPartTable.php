<?php

use App\Models\Part;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class SeedPartTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Part::truncate();


        $csv = Reader::createFromPath(base_path().'/database/csv/parts.csv')
            ->setHeaderOffset(0);

        $sql = 'INSERT INTO parts (part_num, name, part_cat_id, created_at) values (:part_num, :name, :part_cat_id, :created_at)';

        //by setting the header offset we index all records
        //with the header record and remove it from the iteration

        foreach ($csv as $record) {
            DB::statement($sql, [
                'part_num' => $record['part_num'],
                'name' => $record['name'],
                'part_cat_id' => $record['part_cat_id'],
                'created_at' => Carbon::now(),

            ]);

        }
    }
}
