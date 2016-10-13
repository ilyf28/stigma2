<?php
namespace Stigma\ObjectManager\Models;

class Timeperiod extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'timeperiod_name',
        'alias',
        'template_name',
        'is_template',
        'data'
    ];
}
