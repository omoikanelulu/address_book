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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('名');
            $table->string('last_name')->comment('性');
            $table->string('email_address')->unique()->comment('メールアドレス');
            $table->string('phone_number')->unique()->comment('電話番号');
            $table->date('birth_date')->comment('生年月日');
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
        Schema::dropIfExists('people');
    }
};
