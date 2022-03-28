<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_balance_transactions', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->bigInteger('account_balance_id')->unsigned();
            $table->foreign('account_balance_id')->references('id')->on('account_balances');
            $table->bigInteger('amount')->default(0);
            $table->integer('type')->unsigned()->nullable();
            $table->string('comment', 255)->nullable();
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
        Schema::dropIfExists('account_balance_transactions');
    }
};
