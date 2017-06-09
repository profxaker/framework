<?php
/**
 * Подключаем системные файлы
 * User: Андрей
 * Date: 08.06.2017
 * Time: 21:15
 */

// Следим за всеми ошибками
error_reporting(E_ALL);

// Версия PHP
if (version_compare(phpversion(), '7.0.0', '<')) exit('Необходим PHP 7 или выше!');

// Изменение модификации
function modification($filename) {
    if (defined('DIR_CATALOG')) {
        $file = DIR_MODIFICATION . 'admin/' .  substr($filename, strlen(DIR_APPLICATION));
    } elseif (defined('DIR_OPENCART')) {
        $file = DIR_MODIFICATION . 'install/' .  substr($filename, strlen(DIR_APPLICATION));
    } else {
        $file = DIR_MODIFICATION . 'catalog/' . substr($filename, strlen(DIR_APPLICATION));
    }

    if (substr($filename, 0, strlen(DIR_SYSTEM)) == DIR_SYSTEM) {
        $file = DIR_MODIFICATION . 'system/' . substr($filename, strlen(DIR_SYSTEM));
    }

    if (is_file($file)) {
        return $file;
    }

    return $filename;
}

// Движок
require_once(modification(DIR_SYSTEM . 'engine/registry.php'));

// Стартуем проект
function start($application_config) {
    // Инициализация классов фреймворка
    require_once(DIR_SYSTEM . 'framework.php');
}