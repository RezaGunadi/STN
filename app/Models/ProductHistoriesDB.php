<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class ProductHistoriesDB extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'product_histories';
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

    public function input($array)
    {
        $array['product_id'] = $array['id'];
        $array['updated_by'] = Auth::user()->id;

        unset($array['id']);
        unset($array['created_at']);
        unset($array['updated_at']);
        return ProductHistoriesDB::create($array);
    }
}
