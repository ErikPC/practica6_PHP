<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Community::create([
            'title' => 'Comunidad 1',
        ]);

        Community::create([
            'title' => 'Comunidad 2',
        ]);

        Community::create([
            'title' => 'Comunidad 3',
        ]);
    }
}
