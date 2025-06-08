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
    public function starterTeam()
    {
        return $this->belongsTo(TeamsDB::class, 'starter_team_id', 'group_id');
    }
    public function closerTeam()
    {
        return $this->belongsTo(TeamsDB::class, 'closer_team_id', 'group_id');
    }
    public function starterTeams()
    {
        return $this->hasMany(TeamsDB::class, 'starter_team_id', 'group_id');
    }
    public function closerTeams()
    {
        return $this->hasMany(TeamsDB::class, 'closer_team_id', 'group_id');
    }
    public function clientData()
    {
        return $this->belongsTo(User::class, 'client');
    }

    public function details()
    {
        return $this->hasMany(JobDetailsDB::class, 'event_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
