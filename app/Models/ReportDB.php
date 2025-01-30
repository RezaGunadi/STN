<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ReportDB extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'report';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];


    public function product()
    {
        return $this->belongsTo(ProductDB::class, 'item_id');
    }
    public function pelaku()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reporter()
    {
        return $this->belongsTo(User::class, 'created_by');
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
