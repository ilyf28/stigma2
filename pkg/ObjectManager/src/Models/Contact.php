<?php
namespace Stigma\ObjectManager\Models;

class Contact extends \Eloquent
{
    protected $guarded = [];
    protected $fillable = [
        'contact_name',
        'alias',
        'template_name',
        'is_template',
        'data'
    ];
}
