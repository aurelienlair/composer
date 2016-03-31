<?php
namespace WordWrapper;
use Utils\Log\Logger;

class WordWrapper
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function wrap($text, $width)
    {
        $this->logger->write(
            'Wrapping ' . $text . ' with width ' . $width
        );

        return str_replace(" ", PHP_EOL, $text);
    }
}
