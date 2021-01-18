<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsToModuleParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_params', function (Blueprint $table) {
            $table->integer('value')->default(0)->change();
            $table->string('status')->default('disabled')->after('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_params', function (Blueprint $table) {
            $table->integer('value')->change();
            $table->dropColumn('status');
        });
    }
}
