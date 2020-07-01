<?php
IncludeModuleLangFile(__FILE__);
use Bitrix\Main\Loader;

Class alexd_api extends CModule
{
    const MODULE_ID = 'alexd.api';
    var $MODULE_ID = self::MODULE_ID;
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;
    var $strError = '';

    /**
     * alexd_api constructor.
     */
    function __construct()
    {
        $arModuleVersion = array();
        include(dirname(__FILE__) . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = 'Модуль';
        $this->MODULE_DESCRIPTION = 'Описание';
        $this->PARTNER_NAME = 'Alexd.api';
        $this->PARTNER_URI = '/';
    }
    protected static function getRootDirectory()
    {
        return realpath(__DIR__ . '/../../../..');
    }

    function InstallFiles()
    {
        $rootDir = self::getRootDirectory();

        $isCopied = CopyDirFiles(__DIR__.'/admin/', $rootDir.'/bitrix/admin/', true);

        if (!$isCopied) {
            return false;
        }
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFiles($_SERVER['DOCUMENT_ROOT'].'/local/modules/alexd.api/install/admin/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin/');
        return true;
    }

    /**
     * Установка модуля
     */
    function DoInstall()
    {
        $this->InstallFiles();
        if(!$this->create_feedback_iblock() > 0) {
            return false;
        }
        RegisterModule("alexd.api");
    }

    /**
     * Удаление модуля
     */
    function DoUninstall()
    {
        $this->UnInstallFiles();
        UnRegisterModule("alexd.api");
    }

    /**
     * Создаем новый тип инфоблока
     */
    function createIblockType()
    {
        $iblocktype = 'alexdAPI';

        $obIBlockType = new CIBlockType;
        $arFields =[
            'ID'=> $iblocktype,
            'SECTIONS'=>'Y',
            'LANG'=>[
                'ru'=>[
                    'NAME'=> 'Новый тип инфоблока',
                ]
            ]
        ];
        $res = $obIBlockType->Add($arFields);

        return $res;
    }

    function createIblock($iblockType)
    {

        $ib = new \CIBlock;
        $SITE_ID = "s1"; // ID сайта
        $arAccess = [
            "2" => "R", // Все пользователи
        ];

        $arFields = [
            "ACTIVE" => "Y",
            "NAME" => "Форма добовления отзыва о компании",
            "CODE" => "companyFeedback",
            "IBLOCK_TYPE_ID" => $iblockType,
            "SITE_ID" => $SITE_ID,
            "SORT" => "5",
            "GROUP_ID" => $arAccess, // Права доступа
        ];


        $ID = $ib->Add($arFields);
        if ($ID < 0) {
            return false;
        }

        // Определяем, есть ли у инфоблока свойства
        $dbProperties = CIBlockProperty::GetList([], ["IBLOCK_ID"=>$ID]);
        if ($dbProperties->SelectedRowsCount() <= 0) {
            $ibp = new CIBlockProperty;

            $needFields = [
                'FIRST_NAME' => 'Имя',
                'SECOND_NAME' => 'Фамилия',
                'PHONE' => 'Номер телефона',
                'EMAIL' => 'Email',
                'MESSAGE' => 'Текст сообщения',
                'SHOW' => 'Отображать отзыв'
            ];
            foreach ($needFields as $code => $name) {
                $arFields = [
                    "NAME" => $name,
                    "ACTIVE" => "Y",
                    "SORT" => 500,
                    "CODE" => $code,
                    "PROPERTY_TYPE" => "S",
                    "VALUES" => [
                        "VALUE" => "да",
                    ],
                    "IBLOCK_ID" => $ID
                ];
                if($code == 'MESSAGE') {
                    $arFields['ROW_COUNT'] = 3;
                }
                if($code == 'SHOW') {
                    $arFields['PROPERTY_TYPE'] = 'L';
                    $arFields['LIST_TYPE'] = 'C';
                }
                $propId = $ibp->Add($arFields);
                if ($propId > 0) {
                    $arFields["ID"] = $propId;
                    $arCommonProps[$arFields["CODE"]] = $arFields;
                }
            }
        }
        return $ID;
    }
    function create_feedback_iblock()
    {
        Loader::includeModule("iblock");

        $iblockType  = $this->createIblockType();

        if($iblockType) {
            if($this->createIblock($iblockType)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
