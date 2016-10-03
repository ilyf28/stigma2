<?php
namespace Stigma\GlusterFS\Generators;

use Stigma\GlusterFS\Generators\BaseGenerator;

class VolumeGenerator extends BaseGenerator
{
    public function createVolume(array $hosts, $volume_name, $brick_dirs)
    {
        $data = array();
        array_push($data, "[hosts]");
        foreach ($hosts as $host) {
            array_push($data, $host);
        }
        array_push($data, "\n", "[volume]", "action=create", "volname=".$volume_name, "replica=yes", "replica_count=2", "force=yes", "brick_dirs=".$brick_dirs);

        $file = "volume-create.conf";
        $this->outputPath = $this->basePath.$file;
        $this->write($data);

        return $this->outputPath;
    }
}