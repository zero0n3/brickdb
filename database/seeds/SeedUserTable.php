<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class SeedUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::truncate();
        
        factory(App\User::class, 10)->create();

/*
        //
        $sql = 'INSERT INTO users (name, email, password, created_at) values (:name,:email, :password, :created_at)';

        for($i=0; $i<31; $i++) {
            DB::statement($sql, [
                'name' => $i.'Simone',
                'email' => 'asd@asd.com'.$i,
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),

            ]);
        }
        */
    }
}