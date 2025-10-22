<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->index();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->unsignedBigInteger('worker_id')->index();
            $table->foreign('worker_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('amount_paid',10,2)->nullable();
            $table->date('work_date')->nullable();
            $table->foreignId('business_id')->nullable()->constrained('businesses')->onDelete('cascade');
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
        Schema::dropIfExists('task_workers');
    }
}
