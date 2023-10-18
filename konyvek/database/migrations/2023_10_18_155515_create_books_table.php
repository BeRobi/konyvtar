<?php

use App\Models\Book;
use App\Models\Copy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id("book_id");
            $table->string("author", 32);
            $table->longText("title", 150);
            $table->integer("pieces")->default(50);
            $table->timestamps();
        });

        Book::create([
            'author' => 'Paulo Coelho',
            'title' => "Házasságtörés",
            'pieces' => 10
        ]);

        Book::create([
            'author' => 'Ken Follett',
            'title' => "Az örökkévalóság küszöbén",
            'pieces' => 20
        ]);

        Book::create([
            'author' => 'Rhonda Byrne',
            'title' => "A Hős",
            'pieces' => 20
        ]);
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
