<?php

require_once 'config.php';

foreach (glob(__DIR__ . '/App/*.php') as $appFiles) {
    include_once($appFiles);
}

foreach (glob(__DIR__ . '/Controllers/*.php') as $controllerFiles) {
    include_once($controllerFiles);
}

foreach (glob(__DIR__ . '/Models/*.php') as $modelFiles) {
    include_once($modelFiles);
}

?>