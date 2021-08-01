<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMINISTRATOR = 'ROLE_ADMINISTRATOR';
    const ROLE_PROFESSOR = 'ROLE_POST_MAINTAINER';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public static function getRoleList()
    {
        return [
            static::ROLE_ADMINISTRATOR =>'Admin',
            static::ROLE_POST_MAINTAINER => 'Post-Maintainer',
        ];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

}
