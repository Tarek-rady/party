<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{

    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('location')->nullable();
            $table->string('mobile');
            $table->string('manager');
            $table->string('manager_mobile');
            $table->string('img');
            $table->string('location_img');
            $table->boolean('delivary')->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
