<?php

interface ICollection {

  // Добавляет объект в конец коллекции, возвращает boolean
  public function add(Object $object);

  // Добавляет коллекцию объектов в конец коллекции, возвращает boolean
  public function addAll(Collection $collection);

  // Удаляет все элементы из коллекции
  public function clear();

  // Проверяет, содержится ли элемент в коллекции, возвращает boolean
  public function contains(Object $object);

  // Проверяет, содержится ли данная коллекция объектов в коллекции, возвращает boolean
  public function containsAll(Collection $collection);

  // Возвращает хеш-код коллекции (string)
  public function hashCode();

  // Проверяет, является ли коллекция пустой, возвращает boolean
  public function isEmpty();

  // Метод iterator получает экземпляр объекта итератора этой коллекции, возврашает Iterator
  public function iterator();

  // Удаляет объект из коллекции, возвращает boolean
  public function remove(Object $object);

  // Удаляет всю коллекцию из коллекции, возвращает boolean
  public function removeAll(Collection $collection);

  // Удаляет все, кроме данной коллекции объектов из этой коллекции, возвращает boolean
  public function retainAll(Collection $collection);

  // Размер коллекции, возвращает int
  public function size();

  // Получает копию массива объектов, хранящихся в коллекции, возвращает array
  public function toArray();
}
