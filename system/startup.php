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

// Стартуем проект
function start($application_config) {

}