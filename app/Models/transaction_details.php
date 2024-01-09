<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction_details extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';
    protected $fillable = ['transaction_id', 'item', 'quantity'];
    public $timestamps = false;
}
