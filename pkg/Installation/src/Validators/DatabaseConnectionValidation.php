<?php
namespace Stigma\Installation\Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Stigma\Installation\Contracts\ValidationInterface ;

class DatabaseConnectionValidation implements ValidationInterface
{
    protected $capsule ;

    public function __construct()
    {
        $this->capsule = new Capsule ;
    }
    public function passes($data)
    {
        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $data['host'],
            'database'  => $data['database'],
            'username'  => $data['dbuser'],
            'password'  => $data['password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]);

        $this->capsule->getConnection();

        return true ;
    }
}
