<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GeneratesCustomId
{
    public static function bootGeneratesCustomId()
    {
        static::creating(function ($model) {
            $prefix = $model->getCustomIdPrefix();
            $latestId = $model->getLatestCustomId();

            $number = $latestId ? intval(substr($latestId, 1)) + 1 : 1;
            $model->setCustomId($prefix . str_pad($number, 8, '0', STR_PAD_LEFT));
        });
    }

    protected function getCustomIdPrefix()
    {
        if ($this instanceof \App\Models\Doctor) {
            return 'D';
        } elseif ($this instanceof \App\Models\Admin) {
            return 'A';
        } elseif ($this instanceof \App\Models\Nurse) {
            return 'N';
        } elseif ($this instanceof \App\Models\Patient) {
            return 'P';
        } elseif ($this instanceof \App\Models\Receptionist) {
            return 'R';
        } elseif ($this instanceof \App\Models\Technologist) {
            return 'T';
        }

        throw new \Exception('Unknown model type for custom ID generation');
    }

    protected function getLatestCustomId()
    {
        return static::max(static::$customIdColumn);
    }

    protected function setCustomId($id)
    {
        $customIdColumn = static::$customIdColumn;
        $this->$customIdColumn = $id;
    }
}
