<?php

interface IMap extends ICollection {

    // Проверяет, содержит ли Map ключ, возвращает boolean
    public function containsKey(Object $key);

    // Проверяет, содержит ли Map значение, возвращает boolean
    public function containsValue(Object $value);

    public function entrySet();

    public function get(Object $key);

    public function keySet();

    public function put(Object $key, Object $value);

    public function putAll(Map $map);
}
