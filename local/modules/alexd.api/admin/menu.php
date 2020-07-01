<?php
IncludeModuleLangFile(__FILE__); // в menu.php точно так же можно использовать языковые файлы

if($APPLICATION->GetGroupRight("alexd.api")>"D")
{
    $aMenu = [
        "parent_menu" => "global_menu_services",
        "sort"        => 100,
        "url"         => "alexd_api_options.php?lang=".LANGUAGE_ID,
        "text"        => "Настройки модуля alexd.api",
        "title"       => "Настройки модуля alexd.api",
        "icon"        => "form_menu_icon",
        "page_icon"   => "form_page_icon",
        "items_id"    => "alexd_api_options",
        "items"       => [],
    ];

    $aMenu["items"][] =  [
        "text" => 'Настройки',
        "url"  => "alexd_api_options.php?lang=".LANGUAGE_ID,
        "icon" => "form_menu_icon",
        "page_icon" => "form_page_icon",
        "more_url"  => [],
        "title" => 'Настройки'
    ];
    return $aMenu;
}
return false;