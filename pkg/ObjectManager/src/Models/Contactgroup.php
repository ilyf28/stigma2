<?php
namespace Stigma\ObjectManager\Models;

class Contactgroup extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'contactgroup_name',
        'alias',
        'data'
    ];
}
