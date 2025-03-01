<?php


function basepath($path)
{
    return __DIR__ . '/' . $path;
}


function loadPartial($name)
{
    $partialPath = basepath("App/views/partials/{$name}.php");
}

function loadView($name, $data = [])
{
    $viewPath = basepath("App/views/{$name}.view.php");
}
