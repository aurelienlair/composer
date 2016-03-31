<?php
namespace Utils\Log;

class Logger
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename . '.txt';
    }

    public function write($message)
    {
        $handler = fopen(sys_get_temp_dir() . '/' . $this->filename, 'a');
        fputs($handler, $message);
        fclose($handler);
    }
}
