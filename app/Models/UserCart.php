<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCart extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'status',
        'notes',
        'requested_at',
        'approved_at',
        'approved_by'
    ];

    protected $casts = [
        'requested_at' => 'datetime',
        'approved_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductDB::class, 'product_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
