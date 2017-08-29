<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

use Beebeelee\Paymaya\Factory\EntityManagerFactory;
use Doctrine\DBAL\Platforms\MySQL57Platform;
use Doctrine\ORM\EntityManagerInterface;

return [
    'dependencies' => [
        'factories' => [
            EntityManagerInterface::class => EntityManagerFactory::class,
        ],
    ],
    'doctrine' => [
        'params' => [
            'url' => getenv('BBL_PAYMAYA_DSN'),
            'charset' => 'utf8mb4',
            'driver' => 'pdo_mysql',
            'platform' => new MySQL57Platform(),
        ],
        'dev_mode' => true,
        'mapping_directories' => [
            __DIR__ . '/../../mapping/',
        ],
        'proxy_directory' => 'data/',
    ],
];
