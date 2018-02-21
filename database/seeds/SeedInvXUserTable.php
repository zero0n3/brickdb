<?php

use App\Models\Inventory_list;
use App\Models\Inventory_x_user;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class SeedInvXUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Inventory_x_user::truncate();
        
        $csv = Reader::createFromPath(base_path().'/database/csv/inventory_x_user.csv')
            ->setHeaderOffset(0);

        $sql = 'INSERT INTO inventory_x_users (part_id, color_id, quantity, inventory_list_id, created_at) values (:part_id, :color_id, :quantity, :inventory_list_id, :created_at)';

        //by setting the header offset we index all records
        //with the header record and remove it from the iteration

        foreach ($csv as $record) {
            DB::statement($sql, [
                'part_id' => $record['part_id'],
                'color_id' => $record['color_id'],
                'quantity' => $record['quantity'],
                'inventory_list_id' => Inventory_list::first()->id,
                'created_at' => Carbon::now(),

            ]);

        }
    }
}
