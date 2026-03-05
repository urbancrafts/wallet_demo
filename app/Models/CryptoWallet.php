<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency',
        'balance',
        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
      }

    public function cryptoTransaction(){
        return $this->hasMany(CryptoTransaction::class);
    }
}
