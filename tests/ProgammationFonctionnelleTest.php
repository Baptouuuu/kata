<?php
declare(strict_types = 1);

namespace Tests\Kata;

use PHPUnit\Framework\TestCase;
use Innmind\BlackBox\{
    PHPUnit\BlackBox,
    Set,
};

class ProgammationFonctionnelleTest extends TestCase
{
    use BlackBox;

    private $csv1;
    private $csv2;

    public function setUp(): void
    {
        $this->csv1 = function() {
            $csv = \fopen(__DIR__.'/../data.csv', 'r');

            while ($line = \fgets($csv)) {
                yield $line;
            }
        };
        $this->csv2 = function() {
            $csv = \fopen(__DIR__.'/../data-2.csv', 'r');

            while ($line = \fgets($csv)) {
                yield $line;
            }
        };
    }

    public function testLeNombreDePersonnesDunMêmeSexe()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                [$this->csv1, 'homme', 3315],
                [$this->csv1, 'femme', 6685],
                [$this->csv2, 'homme', 3349],
                [$this->csv2, 'femme', 6651],
            ))
            ->then(function($data) {
                [$csv, $sexe, $expected] = $data;

                $count = 0;

                $this->assertSame($expected, $count);
            });
    }
}
