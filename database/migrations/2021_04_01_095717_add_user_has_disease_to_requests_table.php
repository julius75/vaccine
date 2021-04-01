<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserHasDiseaseToRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->string('allergies')->nullable();
            $table->string('reaction')->nullable();
            $table->string('transfusion')->nullable();
            $table->string('problems')->nullable();
            $table->string('vaccinated')->nullable();
            $table->string('pregnant')->nullable();

            $table->string('user_has_disease')->nullable();
            $table->string('immunocompromised')->nullable();
            $table->string('symptoms')->nullable();
            $table->date('test_date')->nullable();
            $table->string('travelled')->nullable();
            $table->string('contacted')->nullable();
            $table->string('tested')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->string('allergies')->nullable();
            $table->string('reaction')->nullable();
            $table->string('transfusion')->nullable();
            $table->string('problems')->nullable();
            $table->string('vaccinated')->nullable();
            $table->string('pregnant')->nullable();

            $table->string('user_has_disease')->nullable();
            $table->string('immunocompromised')->nullable();
            $table->string('symptoms')->nullable();
            $table->date('test_date')->nullable();
            $table->string('travelled')->nullable();
            $table->string('contacted')->nullable();
            $table->string('tested')->nullable();


        });
    }
}
