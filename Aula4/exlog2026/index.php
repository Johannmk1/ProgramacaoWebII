<?php

require __DIR__.'/vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('exlog2026.log', Level::Warning));

// add records to the log
$log->warning('Alerta - Mensagem');
$log->error('Erro - Mensagem');