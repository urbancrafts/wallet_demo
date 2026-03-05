<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_wallet_id')->nullable()->constrained('wallets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('reciepient_wallet_id')->nullable()->constrained('wallets')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['credit', 'debit'])->default('credit');
            $table->decimal('amount',10,2)->default(0.00);
            $table->decimal('balance_before',10,2)->default(0.00);
            $table->decimal('balance_after',10,2)->default(0.00);
            $table->text('reference')->nullable();
            $table->longtext('description')->nullable();
            $table->enum('status', ['Pending', 'Failed', 'Sent', 'Reversed'])->default('Pending');
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
        Schema::dropIfExists('transactions');
    }
}
