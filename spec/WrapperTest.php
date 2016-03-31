<?php
namespace WordWrapper;
use Utils\Counter;

class WrapperTest extends \PHPUnit_Framework_TestCase
{
    private $wordWrapper;
    private $logger;

    public function setUp()
    {
        $this->logger = $this->getMock('Log\Logger');
        $this->wordWrapper = new WordWrapper($this->logger);
    }

    public function testWillWrapAfter4CharactersSinceLengthExceeds4Chars()
    {
        $this->logger->expects($this->once())
            ->method('write');

        $this->assertEquals(
            "word\nword",
            $this->wordWrapper->wrap("word word", 4)
        );
    }

    public function testCanCountNumberOfWordsInWrappedWord()
    {
        $wordsSeparator = "\n";
        $this->assertEquals(
            2,
            Counter::calculate(
                $this->wordWrapper->wrap("word word", 4),
                $wordsSeparator
            )
        );
    }
}
