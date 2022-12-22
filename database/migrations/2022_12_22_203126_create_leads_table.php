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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("lp_campaign_id", 256);
            $table->string("lp_campaign_key", 256);
            $table->string("lp_supplier_id", 256)->nullable();

            $table->string("first_name", 256);
            $table->string("last_name", 256);
            $table->string("phone", 256);
            $table->string("email")->nullable();
            $table->string("zip_code")->nullable();

            $table->foreignId("campaign_id")->nullable()->constrained("campaigns")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
