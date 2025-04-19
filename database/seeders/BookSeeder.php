<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'image' => null,
            'name' => 'test',
            'price' => '200',
            'page_count' => '200',
            'stock' => '2',
            'translator' => 'test',
            'publisher' => 'test',
            'author' => 'test',
            'publication_year' => '1950',
            'is_best_seller' => true,
            'is_1001_books' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
