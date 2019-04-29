<?php
include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

error_reporting(E_ALL);

$timestamp = date('D M d H:i:s e Y');
$user = trim(getenv('USER'));
$dataset = join(",\n",
    array_map(
        function ($element) {
            return "        '{$element['label']}' => array(\n"
                 . "            'label'    => '{$element['label']}',\n"
                 . "            'name'     => '{$element['name']}',\n"
                 . "            'type'     => '{$element['type']}',\n"
                 . (isset($element['os'])       ? "            'os'       => '{$element['os']}',\n" : '')
                 . (isset($element['category']) ? "            'category' => '{$element['category']}',\n" : '')
                 . (isset($element['vendor'])   ? "            'vendor'   => '{$element['vendor']}',\n" : '')
                 . "        )";
        },
        Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . '/../woothee/dataset.yaml'))
    )
);

file_put_contents(
    __DIR__ . '/../src/DataSet.php', <<<__SCRIPT__
<?php
namespace Woothee;

// GENERATED from dataset.yml at {$timestamp} by {$user}
class DataSet
{
    const DATASET_KEY_LABEL            = 'label';
    const DATASET_KEY_NAME             = 'name';
    const DATASET_KEY_TYPE             = 'type';
    const DATASET_KEY_CATEGORY         = 'category';
    const DATASET_KEY_OS               = 'os';
    const DATASET_KEY_OS_VERSION       = 'os_version';
    const DATASET_KEY_VENDOR           = 'vendor';
    const DATASET_KEY_VERSION          = 'version';

    const DATASET_TYPE_BROWSER         = 'browser';
    const DATASET_TYPE_OS              = 'os';
    const DATASET_TYPE_FULL            = 'full';

    const DATASET_CATEGORY_PC          = 'pc';
    const DATASET_CATEGORY_SMARTPHONE  = 'smartphone';
    const DATASET_CATEGORY_MOBILEPHONE = 'mobilephone';
    const DATASET_CATEGORY_CRAWLER     = 'crawler';
    const DATASET_CATEGORY_APPLIANCE   = 'appliance';
    const DATASET_CATEGORY_MISC        = 'misc';

    const ATTRIBUTE_NAME               = 'name';
    const ATTRIBUTE_CATEGORY           = 'category';
    const ATTRIBUTE_OS                 = 'os';
    const ATTRIBUTE_OS_VERSION         = 'os_version';
    const ATTRIBUTE_VENDOR             = 'vendor';
    const ATTRIBUTE_VERSION            = 'version';
    const VALUE_UNKNOWN                = 'UNKNOWN';

    public static \$CATEGORY_LIST = array(
        self::DATASET_CATEGORY_PC,
        self::DATASET_CATEGORY_SMARTPHONE,
        self::DATASET_CATEGORY_MOBILEPHONE,
        self::DATASET_CATEGORY_CRAWLER,
        self::DATASET_CATEGORY_APPLIANCE,
        self::DATASET_CATEGORY_MISC,
        self::VALUE_UNKNOWN,
    );

    public static \$ATTRIBUTE_LIST = array(
        self::ATTRIBUTE_NAME,
        self::ATTRIBUTE_CATEGORY,
        self::ATTRIBUTE_OS,
        self::ATTRIBUTE_OS_VERSION,
        self::ATTRIBUTE_VENDOR,
        self::ATTRIBUTE_VERSION,
    );

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
