<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug','price','start_date','end_date','deadline','description','progress','files','status'
    ];
}
