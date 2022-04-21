<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Lead extends Model
{
    protected $fillable = [
        'project_id', 'customer_name' ,'customer_email' , 'customer_mobile' ,'customer_phone' ,
        'customer_company' , 'company_website','customer_address' ,'customer_country','customer_state' ,  'customer_pin','customer_city','message','subject', 'assigned_to'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'assigned_to', 'id');
    }
    public function project() {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public static function insertData($data) {
        $value = DB::table('leads')->where('subject', $data['subject'])->where('project_id', $data['project_id'])->get();
        if($value->count() == 0) {
           DB::table('leads')->insert($data);
        }
    }
}
