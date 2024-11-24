<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_cars_table.php

public function up()
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('company_name');
        $table->decimal('price', 10, 2);
        $table->text('images');  // Use text to store the JSON or comma-separated links
        $table->integer('model_year');
        $table->integer('max_speed');
        $table->integer('torque');
        $table->integer('no_of_horses');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
