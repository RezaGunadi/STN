<?php

namespace App\Models;

use App\Traits\TracksChanges;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ProductDB;
use App\Models\User;
use App\Models\JobsDB;
use App\Models\JobDetailsDB;
use App\Models\ProductTypeDB;
use App\Models\ChangeLog;

class HistoriesDB extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, TracksChanges;

    protected $table = 'histories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Get the user who created this history entry
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Legacy method for backward compatibility
     * This will now use the new ChangeLog system internally
     */
    public function input($id, $type, $action, $old, $new, $colom, $additionalData)
    {
        try {
            $model = null;
            $modelType = null;

            // Determine the model type and instance
            switch ($type) {
                case 'product':
                    $model = ProductDB::find($id);
                    $modelType = ProductDB::class;
                    break;
                case 'user':
                    $model = User::find($id);
                    $modelType = User::class;
                    break;
                case 'event':
                    $model = JobsDB::find($id);
                    $modelType = JobsDB::class;
                    break;
                case 'event_detail':
                    $model = JobDetailsDB::find($id);
                    $modelType = JobDetailsDB::class;
                    break;
                case 'product_type':
                    $model = ProductTypeDB::find($id);
                    $modelType = ProductTypeDB::class;
                    break;
                default:
                    throw new \Exception("Unknown model type: {$type}");
            }

            if (!$model) {
                throw new \Exception("Model not found for ID: {$id}");
            }

            // Create the change log entry
            $changeLog = ChangeLog::logChange(
                $action,
                $model,
                $colom,
                $old,
                $new,
                $additionalData
            );

            // Create the legacy history entry for backward compatibility
            $params = [
                'ref_id' => $id,
                'ref_type' => $type,
                'desc' => $changeLog->description,
                'created_by' => Auth::id()
            ];

            return static::create($params);
        } catch (\Exception $e) {
            Log::error("Error in HistoriesDB::input: " . $e->getMessage());
            throw $e;
        }
    }
}
