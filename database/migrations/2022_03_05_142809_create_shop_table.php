<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name',150)->nullable();
            $table->string('image',150)->nullable();
            $table->text('address')->nullable();
            $table->string('email');
            $table->enum('status',array('0','1'))->default('1');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
