<?php

namespace Modules\Admin\database\seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\File;
use App\Models\Book;
use Illuminate\Support\Facades\Schema;
class FakeBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Book::truncate();
        Schema::enableForeignKeyConstraints();
        $json = File::get(module_path('Admin').'/database/json/books.json');
        $books =collect(json_decode($json));
        foreach ($books as $key => $value) {
            Book::create([
                "title"=> $value->title,
                "author"=> $value->author,
                "genre"=> $value->genre,
                "description"=> $value->description,
                "isbn" => $value->isbn,
                "published" => date('Y-m-d',strtotime($value->published)),
                "publisher" => $value->publisher
            ]);
        }
    }
}
