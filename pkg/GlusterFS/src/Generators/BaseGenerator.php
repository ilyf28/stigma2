<?php
namespace Stigma\GlusterFS\Generators;

abstract class BaseGenerator
{
    public function write(array $conf)
    {
        $result = file_put_contents($this->outputPath, implode("\n", $conf) . "\n", FILE_APPEND);

        return true;
    }
}