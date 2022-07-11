<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
        
        $data = [
            ['name' => 'Dashboard'],
            ['name' => 'Project management'],
            ['name' => 'Lead management'],
            ['name' => 'Lead Feedback Management'],
            ['name' => 'HR Intern Management'],
            ['name' => 'Sales Intern Management'],
        ];
        DB::table('modules')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}