<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>
<? $APPLICATION->SetTitle("Главная страница");
use Bitrix\Main\Loader;
?>
<div class="bd-example">
    <h2>Добавить отзыв о компании</h2>
    <hr>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Имя</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Фамилия</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">E-mail</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Телефон</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текст сообщения</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-lg btn-block">Добавить отзыв</button>
        </div>
    </form>
</div>
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