<?php
namespace Stigma\ObjectManager\Models;

class Service extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'host_name',
        'service_description',
        'template_name',
        'is_template',
        'data'
    ];
}
