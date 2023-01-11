<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            [
                'note'=>'make resolution',
                "user_id"=>1,
                "completed"=>false,
            ],
            [
                'note'=>'Go to Bed',
                "user_id"=>1,
                "completed"=>false,
            ],            [
                'note'=>'Learn new things',
                "user_id"=>1,
                "completed"=>false,
            ],
        ]); 
    }
}
