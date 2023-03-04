<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
             $table->id();
             $table->string('reg_no')->nullable(true);
             $table->string('name')->nullable(true);
             $table->string('image')->nullable(true);
             $table->string('profession')->nullable(true);
             $table->string('profession_place')->nullable(true);
             $table->string('mobile')->nullable(true);
             $table->string('email')->nullable(true);
             $table->string('village')->nullable(true);
             $table->string('postoffice')->nullable(true);
             $table->string('policestation')->nullable(true);
             $table->string('district')->nullable(true);

             $table->string('nickname')->nullable(true);
             $table->string('gender')->nullable(true);
              $table->date('birthday')->nullable(true);
             $table->string('religion')->nullable(true);
             $table->string('status')->nullable(true);
             $table->string('height')->nullable(true);
             $table->string('weight')->nullable(true);
             $table->string('blood_group')->nullable(true);

             $table->string('university_name')->nullable(true);
             $table->string('university_subject')->nullable(true);
             $table->string('university_degree')->nullable(true);
             $table->string('collage_name')->nullable(true);
             $table->string('collage_subject')->nullable(true);
             $table->string('collage_degree')->nullable(true); 
             $table->string('school_name')->nullable(true);
             $table->string('school_subject')->nullable(true);
             $table->string('school_degree')->nullable(true);

             $table->string('father_name')->nullable(true);
             $table->string('father_profession')->nullable(true);
             $table->string('mother_name')->nullable(true);
             $table->string('mother_profession')->nullable(true);
             $table->string('brother1_name')->nullable(true);
             $table->string('brother1_profession')->nullable(true);
             $table->string('brother1_wife_name')->nullable(true);
             $table->string('brother1_wife__profession')->nullable(true);
             $table->string('brother2_name')->nullable(true);
             $table->string('brother2_profession')->nullable(true);
             $table->string('brother2_wife_name')->nullable(true);
             $table->string('brother2_wife__profession')->nullable(true);
             $table->string('brother3_name')->nullable(true);
             $table->string('brother3_profession')->nullable(true);
             $table->string('brother3_wife_name')->nullable(true);
             $table->string('brother3_wife__profession')->nullable(true);

             $table->string('sister1_name')->nullable(true);
             $table->string('sister1_profession')->nullable(true);
             $table->string('sister1_husband_name')->nullable(true);
             $table->string('sister1__husband_profession')->nullable(true);
             $table->string('sister2_name')->nullable(true);
             $table->string('sister2_profession')->nullable(true);
             $table->string('sister2_husband_name')->nullable(true);
             $table->string('sister2__husband_profession')->nullable(true);
             $table->string('sister3_name')->nullable(true);
             $table->string('sister3_profession')->nullable(true);
             $table->string('sister3_husband_name')->nullable(true);
             $table->string('sister3__husband_profession')->nullable(true);

            $table->string('hobby1')->nullable(true);
            $table->string('hobby2')->nullable(true);
            $table->string('hobby3')->nullable(true);
            $table->string('hobby4')->nullable(true);
           


             



             
             
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
        Schema::dropIfExists('profiles');
    }
}
