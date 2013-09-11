<?php

require_once '../src/php_pandora_api/Pandora.php';

use php_pandora_api\Pandora;

$p = new Pandora('android', 'json');

if (!$p->login('jonathon@compwright.com', 'cleanup')) {
    die(sprintf("Error: %s\nReq: %s\n Resp: %s", $p->last_error, $p->last_request_data, $p->last_response_data));
}

$parameters = array(
    'stationToken' => '231904401307550899',
    'includeExtendedAttributes' => true,
);

if (!$response = $p->makeRequest('station.getStation', $parameters)) {
    die(sprintf("Error: %s\nReq: %s\n Resp: %s", $p->last_error, $p->last_request_data, $p->last_response_data));
}

echo '<pre>';
print_r($response);
echo '</pre>';
