<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('account_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chartaccount_id')->constrained();
            $table->timestamp('date_transaction');
            $table->decimal('amount', 8, 2);
            $table->string('debit');
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
        Schema::dropIfExists('account_transactions');
    }
}
