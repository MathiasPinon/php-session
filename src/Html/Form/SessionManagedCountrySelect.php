<?php

declare(strict_types=1);

namespace Html\Form;

class SessionManagedCountrySelect extends CountrySelect
{
    public function __construct($name, $firstOption, $defaultCode)
    {
        parent::__construct($name, $firstOption, $defaultCode);
    }
}