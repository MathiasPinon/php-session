<?php

declare(strict_types=1);

namespace Html\Form;

use Entity\CountryCollection;
use Entity\Country;

class CountrySelect
{
    private string $name;
    private string $firstOption;
    private string $selectedCode;

    public function __construct($name, $firstOption, $selectedCode)
    {
        $this->name = $name;
        $this->firstOption = $firstOption;
        $this->selectedCode = $selectedCode;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFirstOption(): string
    {
        return $this->firstOption;
    }

    public function setFirstOption(string $firstOption): void
    {
        $this->firstOption = $firstOption;
    }

    public function getSelectedCode(): string
    {
        return $this->selectedCode;
    }

    public function setSelectedCode(string $selectedCode): void
    {
        $this->selectedCode = $selectedCode;
    }

    public function ToHtml(): string
    {
        $html = <<<HTML
                    <select name="{$this->name}">
                        <option value="">{$this->firstOption}</option>
HTML;
        $listePays = CountryCollection::findAll();
        foreach ($listePays as $ligne) {
            if ($ligne->getCode() == $this->selectedCode) {
                $html .= <<<HTML
                         <option value="{$ligne->getCode()}" selected> {$ligne->getName() } </option>
                HTML;
            } else {
                $html .= <<<HTML
                         <option value="{$ligne->getCode()}"> {$ligne->getName() } </option>
                HTML;
            }
        }

        $html .= <<<HTML
                    </select>
HTML;

        return $html;
    }

    public function setSelectedCodeFromRequest(): void
    {

        if (isset($_REQUEST[$this->name])) {
            $this->setSelectedCode($_REQUEST[$this->name]);
        }
    }
}
