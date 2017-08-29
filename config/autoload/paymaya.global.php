<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

use Beebeelee\PayMaya\Factory\PayMayaSDKFactory;
use PayMaya\PayMayaSDK;

return [
    'dependencies' => [
        'factories' => [
            PayMayaSDK::class => PayMayaSDKFactory::class,
        ],
    ],
    'paymaya' => [
        'public_api_key' => getenv('PAYMAYA_PUBLIC_API_KEY'),
        'secret_api_key' => getenv('PAYMAYA_SECRET_API_KEY'),
        'environment' => getenv('PAYMAYA_ENVIRONMENT'),
    ],
];
