<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'status',
        'config',
        'description'
    ];

    protected $casts = [
        'config' => 'array'
    ];

    public function sync()
    {
        // Implement integration-specific sync logic here
        return true;
    }
}
