<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crypto_wallet_id')->nullable()->constrained('crypto_wallets')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['buy', 'sell'])->default('buy');
            $table->decimal('amount',10,8)->default(0.00);
            $table->string('local_currency');
            $table->decimal('local_currency_value',10,2)->default(0.00);
            $table->decimal('transact_fee',10,2)->default(0.00);
            $table->decimal('rate',10,8)->default(0.00);
            $table->longtext('description')->nullable();
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
        Schema::dropIfExists('crypto_transactions');
    }
}
