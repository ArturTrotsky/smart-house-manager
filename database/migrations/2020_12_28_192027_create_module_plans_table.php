<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')
                ->references('id')->on('modules')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->integer('value');
            $table->timestamp('on_date');
            $table->timestamp('off_date');
            $table->boolean('every_day');
            $table->boolean('every_week');
            $table->boolean('every_hour');
            $table->boolean('every_work_day');
            $table->boolean('weekend');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_plans');
    }
}
