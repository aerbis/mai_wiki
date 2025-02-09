<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $fillable = [
        'title', 'text', 'parent_id'
    ];

    public function childPages(): HasMany
    {
        return $this->hasMany($this, 'parent_id');
    }
}
