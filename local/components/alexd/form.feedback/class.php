<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main;
use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc as Loc;

class FormFeedbackComponent extends CBitrixComponent
{
    /**
     * подключает языковые файлы
     */
    public function onIncludeComponentLang()
    {
        $this->includeComponentLang(basename(__FILE__));
        Loc::loadMessages(__FILE__);
    }

    public function onPrepareComponentParams($params)
    {
        $result = [
            'IBLOCK_TYPE' => trim($params['IBLOCK_TYPE']),
            'IBLOCK_ID' => trim($params['IBLOCK_ID']),
            'IBLOCK_CODE' => trim($params['IBLOCK_CODE']),
            'AJAX' => $_REQUEST['ajax']
        ];

        return $result;
    }

    protected function checkModules()
    {
        if (!Loader::includeModule("iblock"))
            throw new Main\LoaderException(Loc::getMessage('Модуль инфоблоки не установлен'));
    }

    /**
     * проверяет заполнение обязательных параметров
     * @throws SystemException
     */
    protected function checkParams()
    {
        if (strlen($this->arParams['IBLOCK_CODE']) <= 0)
            throw new Main\ArgumentNullException('Код инфоблока не заполнен');
    }

    protected function addFeedback()
    {

        if(empty(trim(htmlspecialchars($_REQUEST['firstName']))) || empty(trim(htmlspecialchars($_REQUEST['secondName'])))) {
            $mes[] = 'Не заполнено имя';
        }

        if(!preg_match("/^[+][0-9] [(][0-9]{3}[)] [0-9]{3}[-][0-9]{2}[-][0-9]{2}$/", $_REQUEST['phone'])) {
            $mes[] = 'Телефон задан в неверном формате';
        }

        if(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            $mes[] = 'Email указан неверно';
        }


        if (empty($mes)) {
            $recaptcha = new \ReCaptcha\ReCaptcha(Option::get('alexd.api', 'SECRET_KEY', ''));
            $resp = $recaptcha->setExpectedHostname('192.168.42.76')
                ->verify($_REQUEST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if (!$resp->isSuccess()) {
                $mes[] = 'Ошибка прохождение reCaptcha';
            }
        }

        if (empty($mes)) {
            $data = [
                'PROPERTY_FIRST_NAME'=> trim(htmlspecialchars($_REQUEST['firstName'])),
                'PROPERTY_SECOND_NAME'=> trim(htmlspecialchars($_REQUEST['secondName'])),
                'PROPERTY_MESSAGE'=> trim(htmlspecialchars($_REQUEST['message'])),
            ];

            $el = new CIBlockElement;

            $arFields =[
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
                'NAME' => $data['PROPERTY_FIRST_NAME'] . ' ' . $data['PROPERTY_SECOND_NAME'],
                'PROPERTY_VALUES' => [
                    'FIRST_NAME' => $_REQUEST['firstName'],
                    'SECOND_NAME' => $_REQUEST['secondName'],
                    'PHONE' => $_REQUEST['phone'],
                    'EMAIL' => $_REQUEST['email'],
                    'MESSAGE' => $_REQUEST['message']
                ]
            ];

            if(!$elementId = $el->Add($arFields)) {
                $mes[] = 'Ошибка при добавлении отзыва';
                echo json_encode($mes);
            }
        }
        echo json_encode($mes);
    }

    /**
     * выполняет логику работы компонента
     */
    public function executeComponent()
    {

        global $APPLICATION;

        try
        {
            $this->checkModules();
            $this->checkParams();

            if($this->arParams['AJAX'] == 'Y') {
                $APPLICATION->RestartBuffer();

                $this->addFeedback();

                die();
            }
            $this->includeComponentTemplate();
        }
        catch (Exception $e)
        {
            ShowError($e->getMessage());
        }
    }
}

?>
