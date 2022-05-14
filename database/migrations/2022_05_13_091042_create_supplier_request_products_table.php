<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierRequestProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('supplier_request_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_request_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('qty');
            $table->decimal('unit_cost', 8, 2);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_request_products');
    }
}
