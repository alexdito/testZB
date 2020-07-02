<?php
use Bitrix\Main\Config\Option;
?>

<? require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php"); ?>
<?
$arData = [
    'GOOGLE_API' => [
        'PUBLIC_KEY' => Option::get('alexd.api', 'PUBLIC_KEY', ''),
        'SECRET_KEY' => Option::get('alexd.api', 'SECRET_KEY', ''),
    ]
];

if(isset($_POST['GOOGLE_API'])) {
    foreach ($_POST['GOOGLE_API'] as $key => $value) {
        Option::set('alexd.api', $key, $value, '');
    }
    $publicKey = $_POST['GOOGLE_API']['PUBLIC_KEY'];
    $secretKey = $_POST['GOOGLE_API']['SECRET_KEY'];
} else {
    $publicKey = $arData['GOOGLE_API']['PUBLIC_KEY'];
    $secretKey = $arData['GOOGLE_API']['SECRET_KEY'];
}

?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); ?>

<form action="<?=POST_FORM_ACTION_URI?>" method="post">
    <table>
        <td>Ключи для Google reCaptcha: </td>
        <tr>
            <td>Google API Key: </td>
            <td>
                <input
                        id="ALEXD_GOOGLE_API_KEY"
                        name="GOOGLE_API[PUBLIC_KEY]"
                        value="<?=$publicKey?>"
                >
            </td>
        </tr>
        <tr>
            <td>Google API secret Key: </td>
            <td>
                <input
                        id="ALEXD_GOOGLE_API_KEY"
                        name="GOOGLE_API[SECRET_KEY]"
                        value="<?=$secretKey?>"
                >
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Сохранить"/>
            </td>
        </tr>
    </table>
</form>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php"); ?>