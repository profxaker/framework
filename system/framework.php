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

// Логи
$log = new Log($config->get('error_filename'));
$registry->set('log', $log);

set_error_handler(function($code, $message, $file, $line) use($log, $config) {
    // Ошибка, подавленная @
    if (error_reporting() === 0) {
        return false;
    }

    switch ($code) {
        case E_NOTICE:
        case E_USER_NOTICE:
            $error = 'Уведомление';
            break;
        case E_WARNING:
        case E_USER_WARNING:
            $error = 'Предупреждение';
            break;
        case E_ERROR:
        case E_USER_ERROR:
            $error = 'Фатальная ошибка';
            break;
        default:
            $error = 'Неизвестная ошибка';
            break;
    }

    if ($config->get('error_display')) {
        echo '<b>' . $error . '</b>: ' . $message . ' in <b>' . $file . '</b> on line <b>' . $line . '</b>';
    }

    if ($config->get('error_log')) {
        $log->write('PHP ' . $error . ':  ' . $message . ' in ' . $file . ' on line ' . $line);
    }

    return true;
});