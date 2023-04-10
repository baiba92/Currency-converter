<?php

class Dog
{
    private string $name;
    private string $sex;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $sex, ?Dog $mother = null, ?Dog $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName(): string
    {
        return $this->father->name ?: 'Unknown';
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        return $this->mother === $otherDog->mother;
    }
}