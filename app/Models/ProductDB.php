<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProductDB extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function deletedUser()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
