<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require './autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AXI-eMgJd9oZJY6PAuA9AR9HwyyEXLNl8nYwVcyhxpwKy7QE-vzce4_rzZkb9PkWgB1C98dqFxRbybLG',
    'client_secret' => 'EHIQslziRVLdn38dzIN3zwnXhnZ6AIacL32d-QWnTlHbOO8b62mZVPNXLpjRzNVNZYghjw9tOdl_2LOp',
    'return_url' => 'http://localhost/paypal-rest-api/response.php',
    'cancel_url' => 'http://localhost/paypal-rest-api/payment-cancelled.html'
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
?>