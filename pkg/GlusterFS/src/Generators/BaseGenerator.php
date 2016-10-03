<?php
namespace Stigma\GlusterFS\Generators;

abstract class BaseGenerator
{
    protected $basePath;
    protected $outputPath;

    public function __construct()
    {
        $this->basePath = "/app/stigma/gdeploy/conf/";
    }

    public function write(array $conf)
    {
        if (file_exists($this->outputPath)) {
            unlink($this->outputPath);
        }

        $result = file_put_contents($this->outputPath, implode("\n", $conf) . "\n", FILE_APPEND);

        return true;
    }
}