<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factory extends Model
{
    use softDeletes;
    protected $guarded = [];

    public function nodes()
    {
        return $this->hasMany('App\Node');
    }

    public function tree()
    {
        return $this->belongsTo('App\Tree', 'tree_id', 'id');
    }
}
