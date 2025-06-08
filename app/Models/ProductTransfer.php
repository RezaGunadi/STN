<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'source_team_id',
        'destination_team_id',
        'quantity',
        'status',
        'transferred_by',
        'transfer_date',
        'notes'
    ];

    protected $casts = [
        'transfer_date' => 'datetime'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sourceTeam()
    {
        return $this->belongsTo(Team::class, 'source_team_id');
    }

    public function destinationTeam()
    {
        return $this->belongsTo(Team::class, 'destination_team_id');
    }

    public function transferredBy()
    {
        return $this->belongsTo(User::class, 'transferred_by');
    }
}
