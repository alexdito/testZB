<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main;
use Bitrix\Main\Loader;



try
{
    if (!Loader::includeModule("iblock"))
        throw new Main\LoaderException('Модуль инфоблоки не установлен');

    $iblockTypes = \CIBlockParameters::GetIBlockTypes(Array("-" => " "));

    $iblocks = [0 => " "];
    $iblocksCode = ["" => " "];
    if (isset($arCurrentValues['IBLOCK_TYPE']) && strlen($arCurrentValues['IBLOCK_TYPE']))
    {
        $filter = [
            'TYPE' => $arCurrentValues['IBLOCK_TYPE'],
            'ACTIVE' => 'Y'
        ];
        $iterator = \CIBlock::GetList(['SORT' => 'ASC'], $filter);
        while ($iblock = $iterator->GetNext())
        {
            $iblocks[$iblock['ID']] = $iblock['NAME'];
            $iblocksCode[$iblock['CODE']] = $iblock['CODE'];
        }
    }

    $arComponentParameters = [
        'GROUPS' => [],
        'PARAMETERS' => [
            'IBLOCK_TYPE' => [
                'PARENT' => 'BASE',
                'NAME' => 'Тип инфоблока',
                'TYPE' => 'LIST',
                'VALUES' => $iblockTypes,
                'DEFAULT' => '',
                'REFRESH' => 'Y'

            ],
            'IBLOCK_ID' => [
                'PARENT' => 'BASE',
                'NAME' => 'Код инфоблока',
                'TYPE' => 'LIST',
                'VALUES' => $iblocks
            ],
            'IBLOCK_CODE' => [
                'PARENT' => 'BASE',
                'NAME' => 'Код инфоблока',
                'TYPE' => 'LIST',
                'VALUES' => $iblocksCode
            ]
        ]
    ];
}
catch (Main\LoaderException $e)
{
    ShowError($e->getMessage());
}
?>