<?php
/**
 * Инициализация классов фреймворка
 * User: Андрей
 * Date: 09.06.2017
 * Time: 6:34
 */

// Registry
$registry = new Registry();

// Config
$config = new Config();
$config->load('default');
$config->load($application_config);
$registry->set('config', $config);

echo "<pre>";
print_r($registry);
echo "</pre>";