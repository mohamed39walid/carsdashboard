<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateImagesColumnInCarsTable extends Migration
{
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->text('images')->change();  // Change the column type to TEXT
        });
    }

    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('images')->change();  // Revert to the original type (string)
        });
    }
}
