<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Interop\Container\ContainerInterface;

/** @var ContainerInterface $container */
$container = require 'container.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = $container->get(EntityManagerInterface::class);

return ConsoleRunner::createHelperSet($entityManager);
