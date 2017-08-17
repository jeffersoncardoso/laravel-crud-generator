<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class People
 * @package App\Models
 * @version August 16, 2017, 11:58 pm UTC
 * @method static People find($id=null, $columns = array())
 * @method static People|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string subject
 * @property string description
 * @property string author
 */
class People extends Model
{
    use SoftDeletes;

    public $table = 'news';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'subject',
        'description',
        'author'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'subject' => 'string',
        'description' => 'string',
        'author' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
