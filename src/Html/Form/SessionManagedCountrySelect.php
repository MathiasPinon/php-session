<?php

declare(strict_types=1);

namespace Html\Form;

use Service\Session;

class SessionManagedCountrySelect extends CountrySelect
{
    public function __construct($name, $firstOption, $defaultCode)
    {
        parent::__construct($name, $firstOption, $defaultCode);
        Session::start();
        $this->setSelectedCodeFromSession();
        $this->setSelectedCodeFromRequest();
        $this->saveSelectedCodeIntoSession();
    }

    public function saveSelectedCodeIntoSession()
    {
        $_SESSION[$this->getName()] = $this->getSelectedCode();
    }

    public function setSelectedCodeFromSession()
    {
        if(isset($_SESSION[$this->getName()])) {
            $this->setSelectedCode($_SESSION[$this->getName()]);
        }
        return;
    }
}
