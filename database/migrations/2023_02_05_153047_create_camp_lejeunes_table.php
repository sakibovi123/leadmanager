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
        Schema::create('camp_lejeunes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("is_loved", 1000);
            $table->string("have_attorney", 1000);
            $table->string("first_name", 1000);
            $table->string("last_name", 1000);
            $table->string("email", 1000);
            $table->string("phone", 1000);
            $table->string("address", 1000);
            $table->string("city", 1000);
            $table->string("state", 1000)->nullable();
            $table->string("zip_code", 1000);
            $table->string("ip_address", 1000);
            $table->string("type_of_legal_problem", 1000);

            $table->boolean("is_valid")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camp_lejeunes');
    }
};
