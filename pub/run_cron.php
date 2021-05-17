<?php

use Magento\Framework\App\Bootstrap;


require __DIR__ . '/../app/bootstrap.php';
$bootstrap = Bootstrap::create(BP, $_SERVER);
$obj = $bootstrap->getObjectManager();
$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$objectManager->get('Magento\Framework\Registry')->register('isSecureArea', true);

$objectManager->create('TM\SupplierInventory\Cron\UpdateInventory')->execute();


die("here...");
