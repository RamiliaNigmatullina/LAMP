<!-- https://docs.oracle.com/javase/7/docs/api/java/util/AbstractCollection.html -->

<?php
  abstract class AbstractCollection extends Object implements ICollection {

    public function add(Object $object) {
      throw new UnsupportedOperationException();
    }

    public function addAll(ICollection $collection) {
      $added = false;
      foreach ($collection as $object) {
        if ($this->add($object)) {
          $added = true;
        }
      }
      return $added;
    }

    public function clear() {
      $iterator = $this->iterator();
      while ($iterator->hasNext()) {
        $iterator->next();
        $iterator->remove();
      }
    }

    public function contains(Object $object) {
      $iterator = $this->iterator();
      while ($iterator->hasNext()) {
        if ($object->equals($iterator->next())) {
          return true;
        }
      }
      return false;
    }

    public function containsAll(Collection $collection) {
      foreach ($collection as $object) {
        if (!$this->contains($object)) {
          return false;
        }
      }
      return true;
    }

    public function count() {
      return $this->size();
    }

    public function getIterator() {
      return $this->iterator();
    }

    public function hashCode() {
      return;
    }

    public function isEmpty() {
      return ($this->size() == 0);
    }

    public function remove(Object $object) {
      $iterator = $this->iterator();
      while ($iterator->hasNext()) {
        if ($object->equals($iterator->next())) {
          $iterator->remove();
          return true;
        }
      }
      return false;
    }

    public function removeAll(Collection $collection) {
      $removed = false;
      $iterator = $this->iterator();
      while ($iterator->hasNext()) {
        if ($collection->contains($iterator->next())) {
          $iterator->remove();
          $removed = true;
        }
      }
      return $removed;
    }

    public function retainAll(Collection $collection) {
      $retained = false;
      $iterator = $this->iterator();
      while ($iterator->hasNext()) {
        if (!$collection->contains($iterator->next())) {
          $iterator->remove();
          $retained = true;
        }
      }

      return $retained;
    }

    public function toArray() {
      $iterator = $this->iterator();
      $size = $iterator->size();
      $array = array();
      for ($i = 0; $i < $size; $i++) {
        $array[$i] = $iterator->next();
      }
      return $array;
    }

    public function __toString() {
      $iterator = $this->iterator();
      if (!$iterator->valid()) {
        return new String("[]");
      }

      $stringBuilder = new String("[");
      while ($iterator->hasNext()) {
        $object = $iterator->next();
        $stringBuilder->add(($object == $this) ? "(this collection)" : $object);
        if (!$iterator->valid()) {
          $stringBuilder->add("]");
          return $stringBuilder;
        }
        $stringBuilder->add(", ");
      }
    }

    abstract public function size();

    abstract public function iterator();
  }
