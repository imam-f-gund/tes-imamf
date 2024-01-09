<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = ['no_transaction', 'transaction_date'];
    public $timestamps = false;
}
