<?php

namespace CodePress\CodeCategory\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class Category
 * @package CodePress\CodeCategory\Models
 */
class Category extends Model
{
    use Sluggable;

    /**
     * @var string
     */
    protected $table = 'codepress_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'parent_id'
    ];

    /**
     * @var
     */
    private $validator;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'unique' => true
            ]
        ];
    }

    /**
     * @param Validator $validator
     */
    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return mixed
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @return bool
     */
    public function isValid(){
        $validator = $this->validator;
        $validator->setRules(['name' => 'required|max:55']);
        $validator->setData($this->getAttributes());

        if(!$validator->fails())
            return true;

        $this->errors = $validator->errors();
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function posts()
    {
        return $this->morphedByMany('\CodePress\CodePost\Models\Post', 'categorizable', 'codepress_categorizables');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}