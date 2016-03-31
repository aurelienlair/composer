<?php
require_once __DIR__ . '/../vendor/autoload.php';

$application = new \ApplicationHeader();
$application->run();

echo wordWrapperReadMe();   


$logger = new \Utils\Log\Logger('myLogFile');
$wordWrapper = new \WordWrapper\WordWrapper($logger);
$wordWrapper->wrap("word word", 4);
