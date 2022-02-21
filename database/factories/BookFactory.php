<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Book;
use Faker\Generator as Faker;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Book::class;
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1,20),
            'title' => $this->faker->name(),
            'author' => $this->faker->name(),
            'date_publication' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'code' => $this->faker->isbn10(),
        ];
    }
}
