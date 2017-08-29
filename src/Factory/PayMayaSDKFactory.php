<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Beebeelee\Paymaya\Factory;

use LogicException;
use PayMaya\PayMayaSDK;
use Psr\Container\ContainerInterface;

final class PayMayaSDKFactory
{
    public function __invoke(ContainerInterface $container): PayMayaSDK
    {
        $config = $container->get('config');

        if (!isset($config['paymaya'])) {
            throw new LogicException('Mandatory configuration [paymaya] missing');
        }

        $instance = PayMayaSDK::getInstance();

        $instance->initCheckout(
            $config['paymaya']['public_api_key'],
            $config['paymaya']['secret_api_key'],
            $config['paymaya']['environment']
        );

        return $instance;
    }
}
