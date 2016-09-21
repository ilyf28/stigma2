<?php
namespace Stigma\ObjectManager\Models;

class Servicegroup extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'servicegroup_name',
        'alias',
        'data'
    ];
}
