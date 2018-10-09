<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VisitorDetails
 * @package App\Models
 * @version September 16, 2018, 3:08 am UTC
 *
 * @property \App\Models\Visitor visitor
 * @property integer visitor_id
 * @property string purpose
 * @property string visiting_date
 * @property string visiting_time
 * @property string status
 */
class VisitorDetails extends Model
{
    use SoftDeletes;

    public $table = 'visitor_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function visitors()
    {
        return $this->belongsTo('App\Models\Visitors');
    }


    public $fillable = [
        'visitors_id',
        'visiting_date',
        'visiting_time',
        'satisfied_reason',
        'unsatisfied_reason',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'visitors_id' => 'integer',
        'visiting_date' => 'string',
        'visiting_time' => 'string',
        'satisfied_reason'=>'text',
        'unsatisfied_reason'=>'text',
        'status' => ''
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
