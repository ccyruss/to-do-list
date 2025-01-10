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
        Schema::table('list', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('list', function (Blueprint $table) {
            $table->string('description')->nullable(false)->change();
        });
    }

};
