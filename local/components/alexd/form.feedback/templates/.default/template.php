<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use \Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

Loc::loadLanguageFile(__FILE__);
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Обратная связь</h5>
        </div>
    <div class="modal-body">
        <form action="<?= $APPLICATION->GetCurDir(); ?>" id="form-data">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Имя:</label>
                <input type="text" name="firstName" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Фамилия:</label>
                <input type="text" name="secondName" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Номер телефона:</label>
                <input type="text" name="phone" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" name="email" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Текст сообщения:</label>
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <div class="g-recaptcha" data-sitekey="<?= Option::get('alexd.api', 'PUBLIC_KEY', ''); ?>"></div>
            <input name="ajax" type="hidden" value="Y">
        </form>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="sendResult">Отправить</button>
        </div>
    </div>
</div>

<div id="modalError" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ошибка сохранения</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="color: red" class="errors"></div>
            </div>
            <div class="modal-footer">
                <button id="closeErrors" type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>