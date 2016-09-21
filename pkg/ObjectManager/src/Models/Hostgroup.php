<?php
namespace Stigma\ObjectManager\Models;

class Hostgroup extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'hostgroup_name',
        'alias',
        'data'
    ];
}
