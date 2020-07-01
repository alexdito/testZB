<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>

<?php
$recaptcha = new \ReCaptcha\ReCaptcha('6LdH2akZAAAAADTwODUo-wRMZH158vHyNMkvmx-2');
$resp = $recaptcha->setExpectedHostname('192.168.42.92')
    ->verify($gRecaptchaResponse, $remoteIp);
if ($resp->isSuccess()) {
    // Verified!
} else {
    $errors = $resp->getErrorCodes();
}
?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <form action="?" method="POST">
        <div class="g-recaptcha" data-sitekey="your_site_key"></div>
        <br/>
        <input type="submit" value="Submit">
    </form>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>