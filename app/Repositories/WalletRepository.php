<?php
namespace App\Repositories;

use App\Contracts\WalletInterface;
use App\Models\{Wallet, CryptoWallet};
use App\Enums\TransactionType;
use JWTAuth;

class WalletRepository implements WalletInterface
{

    public function __construct(Wallet $wallet, CryptoWallet $cryptoWallet, Transaction $transact){
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->wallet = $wallet;
        $this->cryptoWallet = $cryptoWallet;
        $this->transact = $transact;
    }


    public function findWalletsByUserId(int $userId)
    {
      return $this->wallet->where('user_id', $userId)->firstOrFail();
    }

    public function findCryptoWalletsByUserId(int $userId)
    {
      return $this->cryptoWallet->where('user_id', $userId)->firstOrFail();
    }

    public function updateWalletBalance(int $amount, TransactionType $type, int $walletID)
    {
        $before = $wallet->whereId($walletID)->balance;

        $after = match ($type) {
            TransactionType::CREDIT => $before + $amount,
            TransactionType::DEBIT => $before - $amount,
        };

        if($after < 0){
            throw new InsufficientFundsException();
        }

        $wallet->whereId($walletID)->update([
            'balance' => $after
        ]);

        return $wallet;
    }

    public function findByUserIdForUpdate(int $wallet_id)
    {
        return $this->user->wallet()->where('id', $wallet_id)->lockForUpdate()->firstOrFail();
    }

    public function updateRecipientBalance($wallet, int $userId, float $newBalance): bool
    {
        $recipient_wallet = $this->wallet->whereUserId($userId)->whereCurrencyType($wallet->currency_type)->first();

        $recipient_wallet->balance = $recipient_wallet->balance + $newBalance;
        return $recipient_wallet->save();
    }

    public function updateSenderBalance($wallet, float $newBalance): bool
    {
        $sender_wallet = $this->user->wallet()->whereId($wallet->id)->first();

        $sender_wallet->balance = $newBalance;
        return $sender_wallet->save();
    }

    public function createTransaction($wallet, int $userId, float $newBalance): bool
    {
        $recipient_wallet = $this->wallet->whereUserId($userId)->whereCurrencyType($wallet->currency_type)->first();

        $this->transact->sender_wallet_id = $wallet->id;
        $this->transact->reciepient_wallet_id = $recipient_wallet->id;
        $this->transact->amount = $newBalance;
        return $this->transact->save();
    }
}
