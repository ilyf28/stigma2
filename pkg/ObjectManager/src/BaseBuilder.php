<?php
namespace Stigma\ObjectManager;

abstract class BaseBuilder
{
    protected function build(array $payload)
    {
        $configs = '';

        foreach ($payload as $unit) {
            $details = $unit->details;
            $type = $unit->type;
            $config = '';

            foreach ($details as $key => $value) {
                $config .= '\t'.$key.'\t'.$value.'\n';
            }

            $configs .= 'define '.$type.'{\n'.$config.'}\n\n';
        }

        return $configs;
    }
}