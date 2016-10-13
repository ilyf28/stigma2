<?php
namespace Stigma\GlusterFS\Generators;

use Stigma\GlusterFS\Generators\BaseGenerator;

class VolumeGenerator extends BaseGenerator
{
    public function createVolume(array $members, $volume_name, $brick_dirs)
    {
        $data = array();
        array_push($data, "[hosts]");
        foreach ($members as $host_name => $address) {
            array_push($data, $address);
        }
        array_push($data, "\n", "[volume]", "action=create", "volname=".$volume_name, "replica=yes", "replica_count=2", "force=yes", "brick_dirs=".$brick_dirs);

        $file = "volume-create.conf";
        $this->outputPath = $this->basePath.$file;
        $this->write($data);

        return $this->outputPath;
    }

    public function deleteVolume(array $members, $volume_name)
    {
        $data = array();
        array_push($data, "[hosts]");
        foreach ($members as $host_name => $address) {
            array_push($data, $address);
        }
        array_push($data, "\n", "[volume]", "action=stop", "volname=".end($members).":".$volume_name, "\n", "[volume]", "action=delete", "volname=".end($members).":".$volume_name);

        $file = "volume-delete.conf";
        $this->outputPath = $this->basePath.$file;
        $this->write($data);

        return $this->outputPath;
    }
}