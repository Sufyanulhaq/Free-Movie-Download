<?php

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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('parent_id');
            $table->timestamps();
        });
        $categories = [
            ['name' => 'Gmail', 'parent_id' => 0],
            ['name' => 'Aged Gmail', 'parent_id' => 1],
            ['name' => 'New Gmail', 'parent_id' => 1],
            ['name' => 'LinkedIn', 'parent_id' => 0],
            ['name' => 'Other Social Media', 'parent_id' => 0],
            ['name' => 'Other Email', 'parent_id' => 0],
        ];
        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
