<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn('images'); // Remove the images column
        });
    }

    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->text('images')->nullable(); // Re-add the images column in case of rollback
        });
    }
};
