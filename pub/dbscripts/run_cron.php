<?php
ini_set('max_execution_time', 999999999);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '5G');
error_reporting(E_ALL);

use Magento\Framework\App\Bootstrap;

require __DIR__ . '/../../app/bootstrap.php';


$bootstrap = Bootstrap::create(BP, $_SERVER);

$objectManager = $bootstrap->getObjectManager();

$state = $objectManager->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');


$objectManager->create('\Adnan\UIGrid\Cron\AddItem')->execute();
