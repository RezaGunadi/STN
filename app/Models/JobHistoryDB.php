<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class JobHistoryDB extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'job_histories';
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

    public function input($array)
    {
        $array['job_id'] = $array['id'];
        $array['updated_by'] = Auth::user()->id;

        unset($array['id']);
        unset($array['created_at']);
        unset($array['updated_at']);
        return JobHistoryDB::create($array);
    }
}
