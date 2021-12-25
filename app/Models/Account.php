<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'account_id', 'account_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'account_id', 'account_id');
    }

}
