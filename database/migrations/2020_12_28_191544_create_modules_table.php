<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->id();
            $table->unsignedBigInteger('module_type_id');
            $table->foreign('module_type_id')
                ->references('id')->on('module_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('object_id');
            $table->foreign('object_id')
                ->references('id')->on('user_objects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->string('ip_adress');
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
        Schema::dropIfExists('modules');
    }
}
