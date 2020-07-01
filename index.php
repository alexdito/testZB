<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>
<? $APPLICATION->SetTitle("Главная страница");
use Bitrix\Main\Loader;
?>
<?php
Loader::includeModule("iblock");
$el = new CIBlockElement;

$arFields =[
    'ACTIVE' => 'Y',
    "IBLOCK_ID" => 18,
    'NAME' => 'asdfadsfafadfafa',
    'PROPERTY_VALUES' => [
        'FIRST_NAME' => 'fdgsg',
        'SECOND_NAME' => 'sfdgsfdgsg',
        'PHONE' => 'afadfadf',
        'EMAIL' => 'dsfafaf',
        'MESSAGE' => 'asdadfasdfafas'
    ]
];
if($elementId = $el->Add($arFields))
    echo "New ID: ".$elementId;
else
    echo "Error: ".$el->LAST_ERROR;
?>
<hr>
<h2>Отзывы</h2>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
</div>
<?php
Loader::includeModule("iblock");


?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>