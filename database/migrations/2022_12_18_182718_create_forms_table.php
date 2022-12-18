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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("lp_campaign_id", 560);
            $table->string("lp_campaign_key", 560);
            $table->string("lp_supplier_id", 560)->nullable();
            $table->string("first_name", 255);
            $table->string("last_name", 255);
            $table->string("phone", 255);
            $table->string("email", 255);
            $table->string("zip_code", 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
