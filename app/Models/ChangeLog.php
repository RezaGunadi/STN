<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ChangeLog extends Model
{
    use SoftDeletes;

    protected $table = 'change_logs';

    protected $fillable = [
        'model_type',
        'model_id',
        'action',
        'field_name',
        'old_value',
        'new_value',
        'user_id',
        'ip_address',
        'user_agent',
        'additional_data'
    ];

    protected $casts = [
        'additional_data' => 'array'
    ];

    /**
     * Get the user who made the change
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the model that was changed
     */
    public function model()
    {
        return $this->morphTo();
    }

    /**
     * Log a change to a model
     *
     * @param string $action The action performed (create, update, delete)
     * @param Model $model The model that was changed
     * @param string|null $fieldName The name of the changed field (for updates)
     * @param mixed|null $oldValue The old value (for updates)
     * @param mixed|null $newValue The new value (for updates)
     * @param array|null $additionalData Any additional context
     * @return ChangeLog
     */
    public static function logChange($action, Model $model, $fieldName = null, $oldValue = null, $newValue = null, $additionalData = null)
    {
        return static::create([
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'action' => $action,
            'field_name' => $fieldName,
            'old_value' => is_array($oldValue) ? json_encode($oldValue) : $oldValue,
            'new_value' => is_array($newValue) ? json_encode($newValue) : $newValue,
            'user_id' => Auth::id(),
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'additional_data' => $additionalData
        ]);
    }

    /**
     * Get a human-readable description of the change
     */
    public function getDescriptionAttribute()
    {
        $user = $this->user ? $this->user->name : 'Unknown User';
        $modelName = class_basename($this->model_type);

        switch ($this->action) {
            case 'create':
                return "{$user} created a new {$modelName}";
            case 'update':
                return "{$user} updated {$modelName} #{$this->model_id} - Changed {$this->field_name} from '{$this->old_value}' to '{$this->new_value}'";
            case 'delete':
                return "{$user} deleted {$modelName} #{$this->model_id}";
            default:
                return "{$user} performed {$this->action} on {$modelName} #{$this->model_id}";
        }
    }
}
