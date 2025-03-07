<?php


function basepath($path)
{
    return __DIR__ . '/' . $path;
}


function loadPartial($name)
{
    $partialPath = basepath("App/views/partials/{$name}.php");
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial {$name} not found.";
    }
}

function loadView($name, $data = [])
{
    $viewPath = basepath("App/views/{$name}.view.php");
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View {$name} not found.";
    }
}

function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function redirect($url)
{
    header("Location: {$url}");
    exit;
}
