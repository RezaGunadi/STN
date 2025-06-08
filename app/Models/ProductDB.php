<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\TracksChanges;

class ProductDB extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, TracksChanges;

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
    public function eventDetail()
    {
        return $this->belongsTo(JobsDB::class, 'event_id');
    }
    public function getTeam()
    {
        return $this->belongsTo(TeamsDB::class,  'team_id', 'group_id');
    }
    public function getTeams()
    {
        return $this->hasMany(TeamsDB::class, 'group_id', 'team_id');
    }
    public function getEvent()
    {
        return $this->belongsTo(JobsDB::class, 'event_id');
    }

    public function team()
    {
        return $this->belongsTo(TeamsDB::class);
    }

    public function transfers()
    {
        return $this->hasMany(ProductTransfer::class);
    }
}
