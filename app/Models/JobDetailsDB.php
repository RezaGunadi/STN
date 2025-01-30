<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JobDetailsDB extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'job_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    public function event()
    {
        return $this->belongsTo(JobsDB::class, 'event_id');
    }
    public function product()
    {
        return $this->belongsTo(ProductDB::class, 'id_product');
    }
    public function closerUser()
    {
        return $this->belongsTo(User::class, 'closer_user_id');
    }
    public function starterUser()
    {
        return $this->belongsTo(User::class, 'starter_user_id');
    }
}
