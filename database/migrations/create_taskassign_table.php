<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskAssignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TaskAssign', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject',200);
            $table->integer('body');
            $table->timestamps('date_task_created');
            $table->timestamps('date_task_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Tasks');
    }
}
