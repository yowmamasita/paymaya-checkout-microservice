<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Beebeelee\PayMaya\Factory;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use LogicException;
use Psr\Container\ContainerInterface;

final class EntityManagerFactory
{
    public function __invoke(ContainerInterface $container): EntityManagerInterface
    {
        $config = $container->get('config');

        if (!isset($config['doctrine'])) {
            throw new LogicException('Mandatory configuration [doctrine] missing');
        }

        $doctrineConfiguration = Setup::createXMLMetadataConfiguration(
            $config['doctrine']['mapping_directories'],
            $config['doctrine']['dev_mode'],
            $config['doctrine']['proxy_directory']
        );

        return EntityManager::create($config['doctrine']['params'], $doctrineConfiguration);
    }
}
