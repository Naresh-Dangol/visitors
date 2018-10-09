<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Record
 * @package App\Models
 * @version September 12, 2018, 8:15 am UTC
 *
 * @property string Fullname
 * @property string address
 * @property string Telephone
 * @property string mobile
 * @property of purpose
 * @property duration visit
 * @property string remarks
 */
class Record extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public $table = 'records';
    
    protected $fillable = [
        'fullname',
        'address',
        'telephone',
        'mobile',
        'email',
        'purpose_of_visit',
        'visit_duration',
        'remarks'                                                                                                   
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fullname' => 'string',
        'address'=>'string',
        'telephone'=>'numeric',
        'mobile'=>'numeric',
        'email'=>'string',
        'purpose_of_visit'=>'string',
        'visit_duration'=>'time',
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
