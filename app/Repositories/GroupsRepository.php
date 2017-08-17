<?php

namespace App\Repositories;

use App\Models\Groups;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GroupsRepository
 * @package App\Repositories
 * @version August 16, 2017, 11:58 pm UTC
 *
 * @method Groups findWithoutFail($id, $columns = ['*'])
 * @method Groups find($id, $columns = ['*'])
 * @method Groups first($columns = ['*'])
*/
class GroupsRepository extends BaseRepository
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
        return Groups::class;
    }
}
