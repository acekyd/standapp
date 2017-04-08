<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    use SoftDeletes;

    protected $fillable = ['title', 'user_id', 'description', 'deadline', 'type'];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
