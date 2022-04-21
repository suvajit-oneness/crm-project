<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadFeedback extends Model
{
    protected $fillable = [
        'lead_id','user_id', 'comment' ,'reminder_date' , 'reminder_time'
    ];

    public function lead() {
        return $this->belongsTo('App\Models\Lead', 'lead_id', 'id');
    }
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
