<?php

namespace Core;

class View
{
    public static function render($viewName, $data = null): self
    {
        foreach ($data ?? [] as $variable_name => $variable) {
            $variable_name = $variable_name;
            $$variable_name = $variable;
        }
        require_once "views/" . $viewName . ".view.php";
        return new self();
    }
}
