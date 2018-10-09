<?php

namespace App\Repositories;

use App\Models\Record;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RecordRepository
 * @package App\Repositories
 * @version September 12, 2018, 8:15 am UTC
 *
 * @method Record findWithoutFail($id, $columns = ['*'])
 * @method Record find($id, $columns = ['*'])
 * @method Record first($columns = ['*'])
*/
class RecordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Record::class;
    }
}
