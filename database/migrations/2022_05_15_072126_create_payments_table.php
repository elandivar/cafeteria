<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->foreignId('employee_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('chartaccounts_id')->constrained('chartaccounts');
            $table->decimal('amount', 8, 2);
            $table->string('docref', 200);
            $table->string('note', 500);
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
        Schema::dropIfExists('payments');
    }
}
