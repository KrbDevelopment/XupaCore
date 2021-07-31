<?php

namespace App\Models;

use \Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    // Append SpatieRole properties
    protected $appends = [
        'description'
    ];

    public function getDescriptionAttribute() {
        return $this->attributes['description'];
    }
}
