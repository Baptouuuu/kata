<?php
declare(strict_types = 1);

namespace Tests\Kata;

use PHPUnit\Framework\TestCase;

class ProgammationFonctionnelleTest extends TestCase
{
    private \Generator $csv;

    public function setUp(): void
    {
        $this->csv = (function() {
            $csv = \fopen(__DIR__.'/../data.csv', 'r');

            while ($line = \fgets($csv)) {
                yield $line;
            }
        })();
    }

    public function testLeNombreDHomme()
    {
        $this->markTestSkipped();

        $this->assertSame(42, $count);
    }
}
