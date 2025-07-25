<?php

use Config\Services;

function verifyRecaptcha($token)
{
    $secretKey = getenv('RECAPTCHA_SECRET_KEY');
    $url = 'https://www.google.com/recaptcha/api/siteverify';

    $response = Services::curlrequest()->post($url, [
        'form_params' => [
            'secret'   => $secretKey,
            'response' => $token,
        ],
    ]);

    $result = json_decode($response->getBody(), true);
    return $result['success'] && $result['score'] > 0.5;
}
