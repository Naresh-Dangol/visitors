<?php

namespace App\Repositories;

use App\Models\VisitorRecord;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VisitorRecordRepository
 * @package App\Repositories
 * @version September 16, 2018, 3:09 am UTC
 *
 * @method VisitorRecord findWithoutFail($id, $columns = ['*'])
 * @method VisitorRecord find($id, $columns = ['*'])
 * @method VisitorRecord first($columns = ['*'])
*/
class VisitorRecordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'visitor_id',
        'visitor_details_id',
        'from_time',
        'to_time',
        'is_fullfilled'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VisitorRecord::class;
    }
}
