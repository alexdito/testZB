<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<hr>
<h2>Отзывы</h2>
<? foreach($arResult["ITEMS"] as $k => $arItem): ?>
    <? if($arItem['PROPERTIES']['SHOW']['VALUE']): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $arItem['NAME']; ?></h5>
                <? foreach ($arItem['PROPERTIES'] as $property): ?>
                    <?if($property['NAME'] == 'Отображать отзыв') break;?>
                    <p class="card-text"><?= $property['NAME'];?>: <?= $property['VALUE']?></p>
                <? endforeach; ?>
                <p class="card-text"><small class="text-muted"><?= $arItem['TIMESTAMP_X']; ?></small></p>
            </div>
        </div>
    <? endif; ?>
<? endforeach; ?>
