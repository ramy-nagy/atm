<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

     public function user()
    {
        return $this->belongsToMany(User::class, 'account_id', 'account_id');
    }

     public function account()
    {
        return $this->belongsToMany(Account::class, 'account_id', 'account_id');
    }

     public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // scope month
    public function scopeMonth($query){
        return $query->whereMonth('sales', '=', date('m'))->
        whereYear('sales', '=', date('Y'));
    }
    // scope day
    public function scopeDay($query)
    {
        return $query->whereMonth('sales', '=', date('m'))
        ->whereYear('sales', '=', date('Y'))
        ->whereDay('sales', '=', date('d'));
    }
}
