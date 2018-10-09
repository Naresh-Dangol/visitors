<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VisitorRecord
 * @package App\Models
 * @version September 16, 2018, 3:09 am UTC
 *
 * @property \App\Models\Visitor visitor
 * @property integer visitor_id
 * @property string visitor_details_id
 * @property string from_time
 * @property string to_time
 * @property string is_fullfilled
 */
class VisitorRecord extends Model
{
    use SoftDeletes;

    public $table = 'visitor_records';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'visitor_id',
        'visitor_details_id',
        'from_time',
        'to_time',
        'is_fullfilled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'visitor_id' => 'integer',
        'visitor_details_id' => 'string',
        'from_time' => 'string',
        'to_time' => 'string',
        'is_fullfilled' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function visitors()
    {
        return $this->belongsTo(\App\Models\Visitors::class);
    }
}
