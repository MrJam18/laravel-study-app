<?php

namespace Database\Seeders;

use App\Models\NewsSourceRequest;
use Illuminate\Database\Seeder;

class NewsSourcesRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \fake();
        for ($i = 0; $i < 100; $i++) {
            $request = new NewsSourceRequest();
            $request->name = $faker->name();
            $request->phone = $faker->phoneNumber();
            $request->email = $faker->email();
            $request->description = $faker->realText();
            $request->text = $faker->realText(1000);
            $request->save();
        }
    }
}
