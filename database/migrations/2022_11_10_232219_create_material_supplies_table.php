<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_supplies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id')->index()->nullable();
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');

            $table->unsignedBigInteger('supplier_id')->index()->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');

            $table->double('quantity',10,2)->nullable();
            $table->double('cost_per',10,2)->nullable();
            $table->double('total_amount',10,2)->nullable();
            $table->date('date_supplied')->nullable();

            $table->string('batchno',30)->nullable();

            $table->unsignedBigInteger('comfirmed_by')->nullable();
            $table->foreign('comfirmed_by')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('material_supplies');
    }
}
