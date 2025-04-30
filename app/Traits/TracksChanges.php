<?php

namespace App\Traits;

use App\Models\ChangeLog;
use Illuminate\Database\Eloquent\Model;

trait TracksChanges
{
    protected static function bootTracksChanges()
    {
        static::created(function (Model $model) {
            ChangeLog::logChange('create', $model);
        });

        static::updated(function (Model $model) {
            $changes = $model->getChanges();
            unset($changes['updated_at']); // Don't track updated_at timestamp changes

            foreach ($changes as $field => $newValue) {
                $oldValue = $model->getOriginal($field);
                if ($oldValue !== $newValue) {
                    ChangeLog::logChange('update', $model, $field, $oldValue, $newValue);
                }
            }
        });

        static::deleted(function (Model $model) {
            ChangeLog::logChange('delete', $model);
        });
    }

    /**
     * Get all changes made to this model
     */
    public function changes()
    {
        return ChangeLog::where('model_type', get_class($this))
            ->where('model_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get the user who last modified this model
     */
    public function lastModifiedBy()
    {
        $lastChange = ChangeLog::where('model_type', get_class($this))
            ->where('model_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->first();

        return $lastChange ? $lastChange->user : null;
    }
}
