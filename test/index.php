<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>
<?$APPLICATION->IncludeComponent(
    "alexd:form.feedback",
    "",
    Array(
        "IBLOCK_CODE" => "companyFeedback",
        "IBLOCK_ID" => "18",
        "IBLOCK_TYPE" => "alexdAPI",
        "AJAX" => $_REQUEST['ajax']
    )
);?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>