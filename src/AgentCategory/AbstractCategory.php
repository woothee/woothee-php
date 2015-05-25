<?php

namespace Woothee\AgentCategory;

use Woothee\DataSet;

abstract class AbstractCategory
{
    protected static function updateMap(&$target, $source)
    {
        foreach ($source as $key => $value) {
            if ($key === DataSet::DATASET_KEY_LABEL || $key === DataSet::DATASET_KEY_TYPE) {
                continue;
            }

            if (strlen($value) > 0) {
                $target[$key] = $value;
            }
        }
    }

    protected static function updateCategory(&$target, $category)
    {
        $target[DataSet::ATTRIBUTE_CATEGORY] = $category;
    }

    protected static function updateVersion(&$target, $version)
    {
        $target[DataSet::ATTRIBUTE_VERSION] = $version;
    }

    protected static function updateOs(&$target, $os)
    {
        $target[DataSet::ATTRIBUTE_OS] = $os;
    }

    protected static function updateOsVersion(&$target, $os_version)
    {
        $target[DataSet::ATTRIBUTE_OS_VERSION] = $os_version;
    }
}
