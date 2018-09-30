<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Node extends Model
{
    use softDeletes;
    protected $guarded = [];

    public function factory()
    {
        return $this->belongsTo('App\Factory', 'factory_id', 'id');
    }
}
