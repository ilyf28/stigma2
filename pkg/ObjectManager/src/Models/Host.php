<?php
namespace Stigma\ObjectManager\Models;

class Host extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'host_name',
        'alias',
        'template_name',
        'is_glusterfs',
        'is_template',
        'data'
    ];
}
