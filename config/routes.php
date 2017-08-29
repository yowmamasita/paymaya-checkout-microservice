<?php

$app->get('/', Beebeelee\Paymaya\Action\HomePageAction::class, 'home');
$app->get('/api/ping', Beebeelee\Paymaya\Action\PingAction::class, 'api.ping');
