<?php
namespace Stigma\Installation\Generators ;

use Mustache_Engine;

abstract class FileGenerator
{
    public function make(array $data)
    {
        $m = new Mustache_Engine; 

        $databaseTmpl = file_get_contents($this->tmplPath);
        $dbContent = $m->render($databaseTmpl, $data) ;
        $ret = file_put_contents($this->outputPath, $dbContent);

        return true ;
    }
}
