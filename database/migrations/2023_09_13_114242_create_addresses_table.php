<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('person_id');
            $table->string('country')->comment('国');
            $table->string('type')->comment('住所の種類');
            $table->integer('postal_code')->comment('郵便番号');
            $table->string('state')->comment('都道府県');
            $table->string('city')->comment('市町村');
            $table->string('street_address')->nullable()->comment('その他の住所');
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
        Schema::dropIfExists('addresses');
    }
};
