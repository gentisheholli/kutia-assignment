<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileManagement extends Model
{
    use HasFactory;

    protected $fillable = ['file_name','user_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function user()
    {
      return $this->belongsTo('App\Models\User','users');
    }

}
