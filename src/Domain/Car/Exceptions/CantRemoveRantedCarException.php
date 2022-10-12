<?php

namespace Domain\Car\Exceptions;

class CantRemoveRantedCarException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Нельзя удалить машину которая арендована");
    }
}