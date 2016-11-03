<?php

namespace CodePress\CodeCategory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class Post
 * @package CodePress\CodeCategory\Models
 */
class Post extends Model{

    /**
     * @var string
     */
    protected $table = 'codepress_posts';

    /**
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    public function categories(){
        return $this->morphToMany('\CodePress\CodeCategory\Models\Category', 'categorizable', 'codepress_categorizables');
    }


}