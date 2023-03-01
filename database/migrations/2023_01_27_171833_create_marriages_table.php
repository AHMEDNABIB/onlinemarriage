<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marriages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reg_no')->nullable();
            $table->bigInteger('divorce_no')->nullable(true);
            $table->bigInteger('death_no')->nullable(true);
            $table->bigInteger('wife_permission_no')->nullable(true);
             $table->string('status')->nullable(true);

            $table->bigInteger('husband_nid')->nullable(true);
            $table->string('husband_nid_image')->nullable(true);
            $table->string('husband_name')->nullable(true);
            $table->string('husband_father_name')->nullable(true);
            $table->string('husband_mother_name')->nullable(true);
            $table->string('husband_religion')->nullable(true); 
            $table->string('husband_dowery')->nullable(true); 
            $table->string('husband_dowery_paid')->nullable(true); 
            $table->string('husband_dowery_remain')->nullable(true); 
            $table->string('husband_image')->nullable(true);
            $table->string('husband_signature')->nullable(true);
            $table->date('husband_birthday')->nullable(true);
            $table->string('husband_flat_no')->nullable(true);
            $table->string('husband_road_name')->nullable(true);
            $table->string('husband_state')->nullable(true);
            $table->string('husband_city_name')->nullable(true);
            $table->string('husband_pincode')->nullable(true);

            $table->bigInteger('wife_nid')->nullable(true);
            $table->string('wife_nid_image')->nullable(true);
            $table->string('wife_name')->nullable(true);
            $table->string('wife_father_name')->nullable(true);
            $table->string('wife_mother_name')->nullable(true);
            $table->string('wife_religion')->nullable(true);  
            $table->date('wife_birthday')->nullable(true);
             $table->string('wife_image')->nullable(true);
             $table->string('wife_signature')->nullable(true);
            $table->string('wife_flat_no')->nullable(true);
            $table->string('wife_road_name')->nullable(true);
            $table->string('wife_state')->nullable(true);
            $table->string('wife_city_name')->nullable(true);
            $table->string('wife_pincode')->nullable(true);

            $table->string('witness1_name')->nullable(true);
            $table->string('witness1_phone')->nullable(true);
            $table->string('witness1_address')->nullable(true);
            $table->string('witness2_name')->nullable(true);
            $table->string('witness2_phone')->nullable(true);
            $table->string('witness2_address')->nullable(true);
            $table->string('witness3_name')->nullable(true);
            $table->string('witness3_phone')->nullable(true);
            $table->string('witness3_address')->nullable(true);
            $table->string('witness4_name')->nullable(true);
            $table->string('witness4_phone')->nullable(true);
            $table->string('witness4_address')->nullable(true);
            
            $table->string('husband_contact_number')->nullable(true);
            $table->string('husband_email')->nullable(true);
            $table->string('wife_contact_number')->nullable(true);
            $table->string('wife_email')->nullable(true);

            $table->string('marriage_address')->nullable(true);
            $table->string('marriage_date')->nullable(true);

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
        Schema::dropIfExists('marriages');
    }
}
