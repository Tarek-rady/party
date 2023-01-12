<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{

    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');

            $table->string('desc_ar');
            $table->string('desc_en');
            $table->string('img');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
