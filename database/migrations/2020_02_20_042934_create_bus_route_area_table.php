<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusRouteAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_route_area', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('route');
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('bus');
            $table->timestamps();
            $table->foreign('route')->references('id')->on('route');
            $table->foreign('area')->references('id')->on('area');
            $table->foreign('bus')->references('id')->on('buses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_route_area');
    }
}
