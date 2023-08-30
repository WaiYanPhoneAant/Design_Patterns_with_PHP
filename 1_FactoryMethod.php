<?php

abstract class KeyboardFactory
{
    abstract function companyName();
    abstract function createKeyboard();

    public function keyboardInfo()
    {
        $keyboard = $this->createKeyboard();
        $companyName = $this->companyName();
        return "This company makes keyboards with " . $keyboard->getSwitches() . " switches and you ordered this from ". $companyName ."\n";
    }
}

abstract class Keyboard
{
    abstract function getSwitches();
}

class BlueSwitchKeyboard extends Keyboard
{
    public function getSwitches()
    {
        return 'blue';
    }
}

class RedSwitchKeyboard extends Keyboard
{
    public function getSwitches()
    {
        return 'red';
    }
}

class Company1KeyboardFactory extends KeyboardFactory
{
    public function companyName() : String {
        return 'Company 1';
    }
    public function createKeyboard()
    {
        return new BlueSwitchKeyboard();
    }
}

class Company2KeyboardFactory extends KeyboardFactory
{
    public function companyName(): String
    {
        return 'Company 2';
    }
    public function createKeyboard()
    {
        return new RedSwitchKeyboard();
    }
}

function orderKeyboard(KeyboardFactory $factory)
{
    echo $factory->keyboardInfo();
}

orderKeyboard(new Company1KeyboardFactory());
orderKeyboard(new Company2KeyboardFactory());
