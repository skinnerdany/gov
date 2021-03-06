<?php

define('DEBUG', true);
define('DS', DIRECTORY_SEPARATOR);

$basePath = realpath(__DIR__ . DS . '..' . DS . '..') . DS;
$appPath = $basePath . 'app' . DS;

$mainConfig = [
/*
anastasiya
denis
dmitry
ivan
natalya
*/
    'dbClassName' => '',
    'basePath' => $basePath,
    'appPath' => $appPath,
    'controllers_dir' => $appPath . 'controllers' . DS,
    'models_dir' => $appPath . 'models' . DS,
    'views_dir' => $appPath . 'views' . DS,
    'error_controller' => 'error',
    'error_action' => 'notfound',
    'controller_request_param' => 'controller',
    'action_request_param' => 'action',
    'default_controller' => 'default',
    'default_action' => 'default',
    'layout_dir' => $appPath . 'views' . DS . 'layouts' . DS,
    'db' => include __DIR__ . DS . 'db.php'
];

return $mainConfig;
