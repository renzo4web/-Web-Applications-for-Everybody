<?php

class Dog
{
    public $name = false;
    public  $age;
    public function makeSound(): string
    {
        if ($this->name !== false) return $this->name."BARK BARK BARK!!!\n";
        return $this->name."NO EXISTE but his age is".$this->age."\n";
    }


}

$pinta = new Dog();

$pinta->name = "Pinta";

$nonDog = new Dog();
$nonDog->age = 23;
print ($pinta->makeSound());
print ($nonDog->makeSound());

