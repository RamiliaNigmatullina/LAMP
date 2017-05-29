<!-- https://docs.oracle.com/javase/8/docs/api/java/util/Map.html -->
<?php

use Collection;
use IMap;

abstract class Map extends Collection implements IMap {

    // возвращает множество ключей
    protected $keySet;

    // Удаялет все пары ключ–значение, которые хранятся в этом мапе, возвращает boolean
    public function clear() {
      $this->entrySet()->clear();
    }

    // Проверяет, хранится ли объект в этом мапе
    public function contains(Object $object) {
      return $this->containsValue($object);
    }

    // Проверяет, хранится ли такой ключ, возвращает boolean
    public function containsKey(Object $key) {
      while ($iterator->hasNext()) {
        $entry = $iterator->next();
        if ($key->equals($entry->getKey())) {
          return true;
        }
      }
      return false;
    }

    // Проверяет, хранится ли такое значение, возвращает boolean
    public function containsValue(Object $value) {
      while ($iterator->hasNext()) {
        $entry = $iterator->next();
        if ($value->equals($entry->getValue())) {
          return true;
        }
      }
      return false;
    }

    // Проверяет, если ли такой объект, возвращает boolean
    public function equals(Object $object) {
      if ($object == $this) {
        return true;
      }
      if (!($object instanceof Map)) {
        return false;
      }
      $params_object = $object;
      if ($params_object->size() != $this->size()) {
        return false;
      }
      $params_object = $object;
      $iterator = $this->entrySet()->iterator();
      while ($iterator->hasNext()) {
        $entry = $iterator->next();
        $key = $entry->getKey();
        $value = $entry->getValue();
        if ($value == null) {
          if (!($params_object->get($key) == null and $params_object->containsKey($key))) {
            return false;
          }
        } else {
          if (!$value->equals($params_object->get($key))) {
            return false;
          }
        }
      }
      return true;
    }

    // Получает по ключу, возвращает объект
    public function get(Object $key) {
      $iterator = $this->entrySet()->iterator();
      if ($key == null) {
        while ($iterator->hasNext()) {
          $entry = $iterator->next();
          if ($entry->getKey() == null) {
            return $entry->getValue();
          }
        }
      } else {
        while ($iterator->hasNext()) {
          $entry = $iterator->next();
          if ($key->equals($entry->getKey())) {
            return $entry->getValue();
          }
        }
      }
      return false;
    }

    // Возвращает хэш-код для этого мапа
    public function hashCode() {
      $hashCode = 0;
      $iterator = $this->entrySet()->iterator();
      while ($iterator->hasNext()) {
        $hashCode .= $iterator->next()->hashCode();
      }
      return $hashCode;
    }

    public function valueSet() {
      if (!$this->valueSet) {
        $this->valueSet = new ValueMapSet($this);
      }
      return $this->valueSet;
    }

    public function put(Object $key, Object $value) {
      throw new UnsupportedOperationException();
    }

    public function putAll(Map $map) {
      $iterator = $map->entrySet()->iterator();
      while ($iterator->hasNext()) {
        $entry = $iterator->next();
        $this->put($entry->getKey(), $entry->getValue());
      }
    }

    public function remove(Object $key) {
      $iterator = $this->entrySet()->iterator();
      while ($iterator->hasNext()) {
        $entry = $iterator->getNext();
        if ($key->equals($entry->getKey())) {
          return $iterator->remove()->getValue();
        }
      }
      return false;
    }

    public function size() {
      return $this->entrySet()->size();
    }

    public function __toString() {
      $iterator = $this->entrySet()->iterator();
      if (!$iterator->hasNext()) {
        return "{}";
      }
      $string = new String("{");
      while ($iterator->hasNext()) {
        $entry = $iterator->next();
        $key = $entry->getKey();
        $value = $entry->getValue();
        $string->add(($key == $this) ? "(this map)" : $key);
        $string->add("=");
        $string->add(($value == $this) ? "(this map)" : $value);
        if (!$iterator->hasNext()) {
          return $string->add("}");
        }
        $string->add(", ");
      }
    }

    // возвращает список ключей
    public function keySet() {
      return $this->keySet;
    }

    // возвращает список значений
    public function valueSet() {
      return $this->valueSet;
    }

    public function iterator() {
      return $this->iterator();
    }

    abstract public function entrySet();
}
