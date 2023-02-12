<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
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
            $review = new Review();
            $review->username = $faker->name();
            $review->text = $faker->text(1000);
            $review->description = $faker->realText(150);
            $review->save();
        }
    }
}
