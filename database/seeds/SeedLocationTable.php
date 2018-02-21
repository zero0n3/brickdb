<?php

use App\Models\Inventory_list;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class SeedLocationTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Location::truncate();
        
        $csv = Reader::createFromPath(base_path().'/database/csv/location.csv')
            ->setHeaderOffset(0);

        $sql = 'INSERT INTO locations (part_id, first_loc, other_loc, user_id, created_at) values (:part_id, :first_loc, :other_loc, :user_id, :created_at)';

        //by setting the header offset we index all records
        //with the header record and remove it from the iteration

        foreach ($csv as $record) {
            DB::statement($sql, [
                'part_id' => $record['part_id'],
                'first_loc' => $record['first_loc'],
                'other_loc' => $record['other_loc'],
                'user_id' => Inventory_list::first()->id,
                'created_at' => Carbon::now(),

            ]);

        }
    }
}
