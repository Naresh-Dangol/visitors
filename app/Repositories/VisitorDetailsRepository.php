<?php

namespace App\Repositories;

use App\Models\VisitorDetails;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VisitorDetailsRepository
 * @package App\Repositories
 * @version September 16, 2018, 3:08 am UTC
 *
 * @method VisitorDetails findWithoutFail($id, $columns = ['*'])
 * @method VisitorDetails find($id, $columns = ['*'])
 * @method VisitorDetails first($columns = ['*'])
*/
class VisitorDetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'visitors_id',
        'visiting_date',
        'visiting_time',
        'satisfied_reason',
        'unsatisfied_reason',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return VisitorDetails::class;
    }
}
