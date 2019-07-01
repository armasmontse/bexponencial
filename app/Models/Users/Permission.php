<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;

class Permission extends Model
{
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug','label'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function scopeCollectPermissionsBySlug($query,$role_slug)
    {
        return $query->where([
            'slug' => $role_slug
        ])->get();
    }
}
