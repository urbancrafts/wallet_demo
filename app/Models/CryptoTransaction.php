<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'crypto_wallet_id',
        'type',
        'amount',
        'local_currency',
        'local_currency_value',
        'transact_fee',
        'rate',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function cryptoWallet(){
        return $this->belongsToMany(CryptoWallet::class);
      }
}
