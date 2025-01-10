<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JobsDB extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'jobs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];



    public function closerUser()
    {
        return $this->belongsTo(User::class, 'closer_user_id');
    }
    public function starterUser()
    {
        return $this->belongsTo(User::class, 'starter_user_id');
    }
    public function history()
    {
        return $this->belongsTo(JobHistoryDB::class, 'job_id');
    }
}
