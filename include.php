<?php
/**
 * @author dev2fun (darkfriend)
 * @copyright darkfriend
 * @version 1.0.0
 */

namespace Dev2fun\NotFound;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

IncludeModuleLangFile(__FILE__);

use Bitrix\Main\Config\Option;
use Bitrix\Main\Loader;
use Bitrix\Main\EventManager;
use Bitrix\Main\Localization\Loc;

Loader::registerAutoLoadClasses(
    "dev2fun.notfound",
    [
        'Dev2fun\NotFound\Base' => __FILE__,
    ]
);

class Base
{
    public static $module_id = 'dev2fun.notfound';
    public static $findDirectories = [
        '/local/php_interface/include/dev2fun.notfound',
        '/bitrix/php_interface/include/dev2fun.notfound',
        '/bitrix/modules/dev2fun.notfound/pages/templates',
    ];
    public static $templates = [];

    public static function InitNotFound()
    {
        global $APPLICATION;
        if (!Loader::includeModule('iblock')) {
            throw new \Exception(Loc::getMessage("NO_INSTALL_IBLOCK"));
        }
        if (!Loader::includeModule('main')) {
            throw new \Exception(Loc::getMessage("NO_INSTALL_IBLOCK"));
        }

        $enabled = Option::get(self::$module_id, 'enable', 'N') === 'Y';
        if(!$enabled) {
            return true;
        }

        if(
            !\defined('ADMIN_SECTION')
            && \defined('ERROR_404')
            && \ERROR_404=='Y'
        ) {
            \CHTTP::SetStatus('404 Not Found');
            $APPLICATION->RestartBuffer();

            $template = Option::get(self::$module_id,'template','default');
            $templates = self::getTemplates();
            if(empty($templates[$template])) {
                $template = 'default';
            }
            require __DIR__.'/pages/404.php';
        }

        return true;
    }

    /**
     * Get path to templates
     * @return array
     */
    public static function getTemplates()
    {
        if(empty(self::$templates)) {
            $templates = [];
            foreach (self::$findDirectories as $findDirectory) {
                $findDirectory = $_SERVER['DOCUMENT_ROOT'].$findDirectory;
                if(!\is_dir($findDirectory)) continue;
                $tree = \scandir($findDirectory);
                if(!$tree) continue;
                $tree = \array_filter($tree, function($dir){
                    if($dir==='.' || $dir==='..') {
                        return false;
                    }
                    return true;
                });
                \array_map(function($dir) use($findDirectory, &$templates){
                    $dirTemplate = $findDirectory.'/'.$dir;
                    if(empty($templates[$dir])) {
                        $templates[$dir] = "$dirTemplate/index.php";
                    }
                }, $tree);
            }
            self::$templates = $templates;
        }
        return self::$templates;
    }

    /**
     * Get names templates
     * @param array $templates
     * @return string[]
     */
    public static function getTemplatesName($templates = [])
    {
        if(!$templates) {
            $templates = self::getTemplates();
        }
        return \array_map(function($template){
            return self::getTemplateName($template);
        },$templates);
    }

    /**
     * Get name templates by dir
     * @param string $dir
     * @return string
     */
    public static function getTemplateName($dir)
    {
        if(!$dir) return;
        return \dirname($dir);
    }
}