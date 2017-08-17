<?php

namespace App\Repositories;

use App\Models\People;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PeopleRepository
 * @package App\Repositories
 * @version August 16, 2017, 11:58 pm UTC
 *
 * @method People findWithoutFail($id, $columns = ['*'])
 * @method People find($id, $columns = ['*'])
 * @method People first($columns = ['*'])
*/
class PeopleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subject',
        'description',
        'author'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return People::class;
    }
}
