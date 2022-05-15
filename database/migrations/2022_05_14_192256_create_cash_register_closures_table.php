<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashRegisterClosuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('cash_register_closures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->decimal('amount_initial', 8, 2);
            $table->decimal('amount_cash', 8, 2);
            $table->decimal('amount_cc', 8, 2);
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
        Schema::dropIfExists('cash_register_closures');
    }
}
