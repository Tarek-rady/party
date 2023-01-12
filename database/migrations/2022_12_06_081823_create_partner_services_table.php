<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerServicesTable extends Migration
{

    public function up()
    {
        Schema::create('partner_services', function (Blueprint $table) {
            $table->foreignId('partner_id')->references('id')->on('partners')->cascadeOnDelete();
            $table->foreignId('service_id')->references('id')->on('services')->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('partner_services');
    }
}
