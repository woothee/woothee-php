<?php
include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$timestamp = chop(`LANG=C date`);
$user = chop(`LANG=C whoami`);
$dataset = join(",\n",
    array_map(
        function ($element) {
            return "        '{$element['label']}' => array(\n"
                 . "            'label'    => '{$element['label']}',\n"
                 . "            'name'     => '{$element['name']}',\n"
                 . "            'type'     => '{$element['type']}',\n"
                 . (isset($element['category']) ? "            'cotegory' => '{$element['category']}',\n" : '')
                 . (isset($element['vendor'])   ? "            'vendor'   => '{$element['vendor']}',\n" : '')
                 . "        )";
        },
        Symfony\Component\Yaml\Yaml::parse("woothee/dataset.yaml")
    )
);

file_put_contents(
    __DIR__ . '/../src/Woothee/DataSet.php', <<<__SCRIPT__
<?php
namespace Woothee;

// GENERATED from dataset.yml at {$timestamp} by {$user}
class DataSet
{
    private static \$dataset = array(
{$dataset}
    );

    public static function get(\$label)
    {
        return static::\$dataset[\$label];
    }
}

__SCRIPT__
);
