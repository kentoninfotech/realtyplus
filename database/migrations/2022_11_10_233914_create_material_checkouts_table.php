<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id')->index()->nullable();
            $table->foreign('material_id')->references('id')->on('materials');

            $table->unsignedBigInteger('checkout_by')->index()->nullable();
            $table->foreign('checkout_by')->references('id')->on('users');

            $table->unsignedBigInteger('approved_by')->index()->nullable();
            $table->foreign('approved_by')->references('id')->on('users');

            $table->unsignedBigInteger('task_id')->index()->nullable();
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->double('quantity',10,2);
            $table->date('dated');
            $table->string('details',100);
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
        Schema::dropIfExists('material_checkouts');
    }
}
