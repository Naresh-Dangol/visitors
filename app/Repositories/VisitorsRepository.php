<?php

namespace App\Repositories;

use App\Models\Visitors;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VisitorsRepository
 * @package App\Repositories
 * @version September 16, 2018, 2:49 am UTC
 *
 * @method Visitors findWithoutFail($id, $columns = ['*'])
 * @method Visitors find($id, $columns = ['*'])
 * @method Visitors first($columns = ['*'])
*/
class VisitorsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fullname',
        'address',
        'telephone',
        'mobile',
        'email_address',
        'visited_date',
        'visited_time',
        'purpose',
        'remarks'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Visitors::class;
    }
}
