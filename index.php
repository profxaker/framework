<?php
/**
 * Файл инициализации проекта
 * User: Андрей
 * Date: 08.06.2017
 * Time: 17:58
 */

// Основная конфигурация проекта
if (is_file('config.php')) require_once('config.php');

// Подключаем системные файлы
require_once(DIR_SYSTEM . 'startup.php');
// Стартуем проект
start('public');