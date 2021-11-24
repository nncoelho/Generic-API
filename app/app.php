<?php

define('BASE_API', 'http://localhost/genericAPI/api/?option=');

echo '<h3>GENERIC API</h3><hr>';

for ($i = 0; $i < 10; $i++) {
    $result = api_request('random&min=100&max=200');

    // Verify if response is success
    if ($result['status'] == 'ERROR') {
        die('An ERROR has occurred in the API Call.');
    }
    echo "The random number is: " . $result['data'] . '<br>';
}

echo '<p>CONCLUDED</p>';

function api_request($option)
{
    $client = curl_init(BASE_API . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response, true);
}
