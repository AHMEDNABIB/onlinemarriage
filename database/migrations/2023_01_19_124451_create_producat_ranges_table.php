<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducatRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producat_ranges', function (Blueprint $table) {
            $table->id();
            $table->integer('categories_id')->nullable();
            $table->integer('sub_categories_id')->nullable();
            $table->string('title')->nullable();
            $table->string('offer_price')->nullable();
            $table->string('main_price')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producat_ranges');
    }
}
