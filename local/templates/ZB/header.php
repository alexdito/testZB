<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?$APPLICATION->ShowHead();?>

    <?
    use Bitrix\Main\Page\Asset;
    $asset = Asset::getInstance();
    $asset->getInstance()->addString('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">');
    $asset->getInstance()->addJs("<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>");
    $asset->getInstance()->addJs("<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>");
    $asset->getInstance()->addJs("<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>");
    ?>

    <title><?$APPLICATION->ShowTitle()?></title>
</head>
<body class="text-center">

<div id="panel"><?$APPLICATION->ShowPanel();?></div>

<div style="text-align: left" class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="/">Главная страница</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">Добавить отзыв</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">Отзывы о компании</a>
        </li>
    </ul>