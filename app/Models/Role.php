<?php

namespace App\Models;

use \Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    // Append SpatieRole properties
    protected $appends = [
        'description'
    ];

    public function getDescriptionAttribute() {
        return $this->attributes['description'];
    }
}
