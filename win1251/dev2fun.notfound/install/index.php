<?php
IncludeModuleLangFile(__FILE__);
/**
 * @author dev2fun (darkfriend)
 * @copyright darkfriend
 * @version 1.0.0
 */
if (class_exists('dev2fun_notfound')) return;


use Bitrix\Main\ModuleManager,
    Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc,
    Bitrix\Main\IO\Directory,
    Bitrix\Main\Config\Option;

Loader::registerAutoLoadClasses(
    'dev2fun.notfound',
    [
        'Dev2fun\\NotFound\\Base' => 'include.php',
        'Dev2fun\\NotFound\\Config' => 'classes/general/Config.php',
    ]
);

class dev2fun_notfound extends CModule
{
    var $MODULE_ID = 'dev2fun.notfound';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_GROUP_RIGHTS = "Y";

    public function __construct()
    {
        include(__DIR__ . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

        $this->MODULE_NAME = Loc::getMessage('D2F_MODULE_NAME_NOTFOUND');
        $this->MODULE_DESCRIPTION = Loc::getMessage('D2F_MODULE_DESCRIPTION_NOTFOUND');
        $this->PARTNER_NAME = 'dev2fun';
        $this->PARTNER_URI = 'http://dev2fun.com';
    }

    public function DoInstall()
    {
        global $APPLICATION, $DB;
        if (!check_bitrix_sessid()) return;
        $DB->StartTransaction();
        try {
            if (!Loader::includeModule('main')) {
                throw new Exception(Loc::getMessage("NO_INSTALL_IBLOCK"));
            }
            $this->installDB();
            $this->registerEvents();
            $DB->Commit();
            ModuleManager::registerModule($this->MODULE_ID);
            \CAdminNotify::Add([
                'MESSAGE' => Loc::getMessage('D2F_NOTFOUND_NOTICE_THANKS'),
                'TAG' => $this->MODULE_ID . '_install',
                'MODULE_ID' => $this->MODULE_ID,
            ]);
        } catch (Exception $e) {
            $DB->Rollback();
            $GLOBALS['D2F_NOTFOUND_ERROR'] = $e->getMessage();
            $GLOBALS['D2F_NOTFOUND_ERROR_NOTES'] = Loc::getMessage('D2F_NOTFOUND_INSTALL_ERROR_NOTES');
            $APPLICATION->IncludeAdminFile(
                Loc::getMessage("D2F_NOTFOUND_STEP_ERROR"),
                __DIR__ . "/error.php"
            );
            return false;
        }
        $APPLICATION->IncludeAdminFile(Loc::getMessage("D2F_NOTFOUND_STEP1"), __DIR__ . "/step1.php");
    }

    public function installDB()
    {
        Option::set($this->MODULE_ID, 'enable', 'Y');
        Option::set($this->MODULE_ID, 'template', 'default');
        return true;
    }

    public function registerEvents()
    {
        $eventManager = EventManager::getInstance();
        $eventManager->registerEventHandler(
            'main',
            'OnEpilog',
            $this->MODULE_ID,
            'Dev2fun\\NotFound\\Base',
            'InitNotFound',
            500
        );
        return true;
    }

    public function DoUninstall()
    {
        global $APPLICATION, $DB;
        if (!check_bitrix_sessid()) return;
        $DB->StartTransaction();
        try {
            if (!Loader::includeModule('main')) {
                throw new Exception(Loc::getMessage("NO_INSTALL_IBLOCK"));
            }
            $this->unInstallDB();
            $this->unRegisterEvents();
            $DB->Commit();
            \CAdminNotify::Add([
                'MESSAGE' => Loc::getMessage('D2F_NOTFOUND_NOTICE_WHY'),
                'TAG' => $this->MODULE_ID . '_uninstall',
                'MODULE_ID' => $this->MODULE_ID,
            ]);
            ModuleManager::unRegisterModule($this->MODULE_ID);
        } catch (Exception $e) {
            $DB->Rollback();
            $GLOBALS['D2F_COMPRESSIMAGE_ERROR'] = $e->getMessage();
            $GLOBALS['D2F_COMPRESSIMAGE_ERROR_NOTES'] = Loc::getMessage('D2F_NOTFOUND_UNINSTALL_ERROR_NOTES');
            $APPLICATION->IncludeAdminFile(
                Loc::getMessage("D2F_NOTFOUND_STEP_ERROR"),
                __DIR__ . "/error.php"
            );
            return false;
        }

        $APPLICATION->IncludeAdminFile(GetMessage("D2F_MULTIDOMAIN_UNSTEP1"), __DIR__ . "/unstep1.php");
    }

    public function unInstallDB()
    {
        Option::delete($this->MODULE_ID);
        return true;
    }

    public function unRegisterEvents()
    {
        $eventManager = EventManager::getInstance();
        $eventManager->unRegisterEventHandler('main', 'OnEpilog', $this->MODULE_ID);
        return true;
    }
}
