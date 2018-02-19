<?php

use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class SeedColorTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Color::truncate();


        $csv = Reader::createFromPath(base_path().'/database/csv/colors.csv')
            ->setHeaderOffset(0);

        $sql = 'INSERT INTO colors (id, name, rgb, is_trans, created_at) values (:id, :name, :rgb, :is_trans, :created_at)';

        //by setting the header offset we index all records
        //with the header record and remove it from the iteration

        foreach ($csv as $record) {
            DB::statement($sql, [
                'id' => $record['id'],
                'name' => $record['name'],
                'rgb' => $record['rgb'],
                'is_trans' => $record['is_trans'],
                'created_at' => Carbon::now(),

            ]);

        }
    }
}
