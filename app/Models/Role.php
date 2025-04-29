<?php

namespace App\Models;

use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    Protected $table = "Role";

    public function permissions()
{
    return $this->belongsToMany(Permission::class, 'permission_role');
}
    public function Utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_rol');
    }

    public function users()
    {
        return $this->belongsToMany(Utilisateur::class);
    }
}
