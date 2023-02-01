<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_sources')->insert($this->getData());
    }
    private function getData(): array
    {
        $data = [];
        for($i = 0; $i < 30; $i++) {
            $data[] = [
                'name' => \fake()->text(50),
                'created_at' => \date("Y-m-d H:i:s"),
                'updated_at' => \date("Y-m-d H:i:s")
            ];
        }
        return $data;
    }
}
