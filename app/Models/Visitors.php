<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Visitors
 * @package App\Models
 * @version September 16, 2018, 2:49 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection VisitorDetail
 * @property \Illuminate\Database\Eloquent\Collection VisitorRecord
 * @property string fullname
 * @property string address
 * @property string telephone
 * @property string mobile
 * @property string email_address
 */
class Visitors extends Model
{
    use SoftDeletes;

    protected $dispatchEvents=[

    ];

    public $table = 'visitors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function visitorDetails()
    {
        return $this->hasMany('App\Models\VisitorDetails');
    }


    public $fillable = [
        'fullname',
        'address',
        'telephone',
        'mobile',
        'email_address',
        'visit_date',
        'visit_time',
        'purpose',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fullname' => 'string',
        'address' => 'string',
        'telephone' => 'string',
        'mobile' => 'string',
        'email_address' => 'string',
        'visit_date' =>'string',
        'visit_time'=>'string',
        'purpose'=>'string',
        'remarks'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

   

    
}
