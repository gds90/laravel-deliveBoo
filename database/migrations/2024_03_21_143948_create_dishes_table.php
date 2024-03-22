<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->default('');
            $table->string('slug', 100)->unique(); // Adding slug column
            $table->string('cover_image', 255)->default('');
            $table->text('description');
            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('visible')->default(true);
            $table->timestamps();
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
};
