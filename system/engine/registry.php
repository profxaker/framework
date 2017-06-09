<?php

/**
 * Registry
 * User: Андрей
 * Date: 09.06.2017
 * Time: 6:39
 */
final class Registry {
    private $data = array();

    public function get($key) {
        return (isset($this->data[$key]) ? $this->data[$key] : null);
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
    }

    public function has($key) {
        return isset($this->data[$key]);
    }
}