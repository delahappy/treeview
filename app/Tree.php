<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tree extends Model
{
    use softDeletes;
    protected $guarded = [];

    public function factories()
    {
        return $this->hasMany('App\Factory', 'tree_id', 'id');
    }

    public function nodes()
    {
        return $this->hasManyThrough('App\Node', 'App\Factory');
    }
}
