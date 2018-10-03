<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Tags\TaggableInterface;
use Cartalyst\Tags\TaggableTrait;

class Issue extends Model implements TaggableInterface
{
    use TaggableTrait;

    protected $fillable = ['title', 'description', 'code', 'categories', 'tags'];
}
