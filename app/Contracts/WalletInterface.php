<?php
namespace App\Contracts;

use App\Models\{Wallet, CryptoWallet};
use App\Enums\TransactionType;

interface WalletInterface{


    public function findWalletsByUserId(int $userID);
    public function findCryptoWalletsByUserId(int $userID);

    public function findSingleWalletById(int $id);
    public function findSingleCryptoWalletById(int $id);


   public function updateWalletBalance(int $amount, TransactionType $type, int $walletID);
   public function updateCryptoWalletBalance(int $amount, TransactionType $type, int $cryptoWalletID);

}