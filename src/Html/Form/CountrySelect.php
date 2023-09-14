<?php

declare(strict_types=1);

namespace Html\Form;

use src\Entity\CountryCollection;

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
    <!doctype html> 
        <html lang="fr">
            <head>
                <meta name="viewport" content="initial-scale=1, maximum-scale=1">
                <meta charset="UTF-8">
                <title>
                    {$this->name}
                </title>
            </head>
            <body>
                <form name="{$this->name}" method="get" > 
                    <label>
                    Nom des pays
                    <select>
                        <option value="">{$this->firstOption}</option>
HTML;
        $listePays = CountryCollection::findAll();
        foreach ($listePays as $ligne) {
            if ($ligne->code == $this->selectedCode) {
                $html .= <<<HTML
                         <option value="{$ligne->code}" selected> {$ligne->name } </option>
                HTML;
            } else {
                $html .= <<<HTML
                         <option value="{$ligne->code}"> {$ligne->name } </option>
                HTML;
            }
        }

        $html .= <<<HTML
                        <button type="submit">Envoyer</button>
                    </label>
                </form>
            </body>
HTML;

        return $html;
    }

    public function setSelectedFromRequest()
    {
        foreach ($_REQUEST as $ligne )
        {

        }
    }
}
