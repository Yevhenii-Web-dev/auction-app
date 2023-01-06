<?php

use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
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
        Schema::create('category_lot', function (Blueprint $table) {
            $table->foreignId('lot_id')->constrained('lots');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => DatabaseSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_lot');
    }
};
