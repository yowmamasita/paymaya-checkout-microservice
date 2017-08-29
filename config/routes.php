<?php

$app->get('/', Beebeelee\PayMaya\Action\HomePageAction::class, 'home');
$app->get('/api/ping', Beebeelee\PayMaya\Action\PingAction::class, 'api.ping');
