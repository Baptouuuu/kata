<?php
declare(strict_types = 1);

namespace Tests\Kata;

use PHPUnit\Framework\TestCase;
use Innmind\BlackBox\{
    PHPUnit\BlackBox,
    Set,
};

/**
 * Le but de cet exercice est d'utiliser les structures de données fournies par
 * le package innmind/immutable (déjà installé). Les premières tentatives de
 * résolutions des exercices devraient être fait de façon impérative pour se
 * familiariser avec les données avant d'essayer de refactorer via
 * innmind/immutable
 *
 * @see https://github.com/Innmind/Immutable/blob/develop/docs/README.md
 */
class AnalyseFichierTest extends TestCase
{
    use BlackBox;

    /** @var \Generator<string> */
    private $csv1;
    /** @var \Generator<string> */
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

    public function testLeNombreDePersonnesDunMêmeSexeDansLensembleDesFichiers()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                ['homme', 6664],
                ['femme', 13336],
            ))
            ->then(function($data) {
                [$sexe, $expected] = $data;

                $count = 0;

                $this->assertSame($expected, $count);
            });
    }

    public function testLesNomsDeFamilleEntreLesLignes1000Et1050()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                [$this->csv1, 'Michel, Dubois, Durand, David, Bertrand-Martin, Durand-Morel, Martin, Bertrand, Leroy-Simon, Petit-Girard, Lefebvre-Durand, Bernard-Simon, Bernard-Laurent, Roux-Simon, David-Michel, Dubois-Robert, Girard-Richard, Richard, Moreau, Robert, Bernard, Petit-Martin, Girard-Leroy, Girard-Lefebvre, Thomas, Roux, Fournier, Fournier-Leroy, Dubois-Michel, Simon-Moreau, Bernard-Girard, Dubois-Roux, Moreau-Bernard, Leroy, Petit, David-Martin, Dubois-Simon'],
                [$this->csv2, 'Petit-Bertrand, Moreau, Morel-Roux, Fournier, Michel, Richard-Simon, Richard-Moreau, Bernard-Lefebvre, Leroy-Girard, Girard, Roux-Richard, Bernard-Richard, Martin, Girard-Moreau, Morel-Moreau, Thomas, Durand, Morel-Laurent, Leroy, Robert, Michel-Simon, Thomas-Leroy, David-Richard, Bertrand, Roux-Moreau, Michel-Lefebvre, Roux, Lefebvre, Martin-Girard, Laurent, Robert-Fournier, Moreau-Bernard, Robert-Girard, Morel-Martin, Bernard-Robert, Laurent-Petit, Durand-Simon, Michel-Bernard, Michel-Durand'],
            ))
            ->then(function($data) {
                [$csv, $expected] = $data;

                $noms = '';

                $this->assertSame($expected, $noms);
            });
    }

    public function testLesNomsDeFamilleDesHabitantsDeLyonNésEn1990()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                [$this->csv1, 'Bertrand, Laurent, Morel-Michel, Durand'],
                [$this->csv2, 'Roux, Laurent-Morel, Simon, Moreau'],
            ))
            ->then(function($data) {
                [$csv, $expected] = $data;

                $noms = '';

                $this->assertSame($expected, $noms);
            });
    }

    public function testSiUnHommePrénomméMarieNéEn2016HabiteLyon()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                [$this->csv1, false],
                [$this->csv2, true],
            ))
            ->then(function($data) {
                [$csv, $expected] = $data;

                $existe = null;

                $this->assertSame($expected, $existe);
            });
    }

    public function testLesNomsDeFamillePrésentDansLes500PremièresLignesDes2Fichiers()
    {
        $this->markTestSkipped();

        $noms = [];

        $this->assertSame(
            [
                'Moreau',
                'Bernard',
                'Robert-Robert',
                'Girard',
                'Laurent',
                'Robert',
                'Dubois-Michel',
                'Michel',
                'Martin',
                'Bertrand',
                'Durand',
                'David-Fournier',
                'Roux',
                'Roux-Bernard',
                'Petit',
                'Laurent-Richard',
                'Laurent-Girard',
                'Thomas-Morel',
                'Thomas',
                'Lefebvre-Martin',
                'Leroy',
                'Martin-Girard',
                'Bernard-Laurent',
                'Richard',
                'Dubois',
                'Morel-David',
                'David',
                'Lefebvre',
                'Martin-Martin',
                'Martin-Dubois',
                'Bernard-Michel',
                'Michel-David',
                'Simon',
                'Simon-Bertrand',
                'Leroy-Lefebvre',
                'Laurent-Fournier',
                'Thomas-Dubois',
                'Leroy-Morel',
                'Richard-Leroy',
                'Fournier',
                'Laurent-Morel',
                'David-Petit',
                'Morel-Simon',
                'Morel',
                'David-Bernard',
                'Durand-Robert',
                'Petit-Simon',
                'Morel-Dubois',
                'Robert-Moreau',
                'Thomas-Lefebvre',
                'Girard-Moreau',
                'Fournier-Richard',
                'Moreau-Bertrand',
                'Simon-Fournier',
                'Petit-Michel',
                'Durand-Richard',
                'Girard-Bertrand',
                'Bernard-Morel',
                'Richard-Morel',
                'Martin-Durand',
                'Fournier-Moreau',
                'Simon-Durand',
                'Bertrand-Robert',
                'Richard-Lefebvre',
                'Petit-Dubois',
                'Michel-Morel',
                'Girard-Michel',
                'David-David',
                'Fournier-Simon',
                'Fournier-Fournier',
                'Laurent-Robert',
                'David-Bertrand',
                'Thomas-Michel',
                'Girard-Martin',
                'Fournier-Durand',
                'Moreau-Dubois',
                'Bertrand-Durand',
                'Bertrand-Dubois',
                'Fournier-Martin',
                'Robert-Simon',
                'Thomas-Leroy',
                'Martin-Leroy',
                'Lefebvre-Richard',
                'Morel-Martin',
                'Dubois-Fournier',
                'Laurent-Michel',
                'Fournier-Bernard',
                'Durand-Moreau',
                'Martin-Roux',
                'Dubois-Robert',
                'Girard-Girard',
                'Bertrand-Richard',
                'Michel-Michel',
                'Bertrand-Lefebvre',
                'Girard-Morel',
                'Moreau-Roux',
                'Leroy-Petit',
                'Richard-Petit',
                'Thomas-Laurent',
                'Durand-Girard',
                'Bernard-Simon',
                'Robert-Roux',
                'Bernard-Moreau',
                'Thomas-Robert',
                'Moreau-David',
                'Robert-Dubois',
                'Petit-Richard',
                'Lefebvre-Roux',
                'Petit-Leroy',
                'Morel-Girard',
                'Dubois-David',
                'Michel-Durand',
                'Laurent-Lefebvre',
                'Bernard-Richard',
                'Moreau-Lefebvre',
                'Bertrand-Bertrand',
            ],
            $noms,
        );
    }

    public function testLadresseDeLaPremièrePersonneHabitantAUnCodePostal()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                [$this->csv1, '77954', '168 rue Georges Clémenceau'],
                [$this->csv2, '82057', '170 rue Victor Hugo'],
            ))
            ->then(function($data) {
                [$csv, $codePostal, $expected] = $data;

                $adresse = '';

                $this->assertSame($expected, $adresse);
            });
    }

    public function testLaCombinaisonDes20PremièresVillesDuPremierFichierAvecLes20DernièresDuDeuxième()
    {
        $this->markTestSkipped();

        $villes = [];

        $this->assertSame(
            [
                'Dijon-Le Havre',
                'Saint-Etienne-Lille',
                'Villeurbanne-Grenoble',
                'Toulouse-Rennes',
                'Toulon-Toulouse',
                'Lille-Montpellier',
                'Nantes-Saint-Denis',
                'Montpellier-Dijon',
                'Grenoble-Villeurbanne',
                'Nice-Reims',
                'Le Havre-Saint-Etienne',
                'Reims-Lyon',
                'Paris-Toulon',
                'Bordeaux-Bordeaux',
                'Lyon-Marseille',
                'Marseille-Paris',
                'Rennes-Nice',
                'Strasbourg-Nantes',
                'Saint-Denis-Angers',
                'Angers-Strasbourg',
            ],
            $villes,
        );
    }

    public function testLesVillesDéfiniesEntreLapparitionDe2Adresses()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                [
                    $this->csv1,
                    '146 boulevard Général Leclerc',
                    '35 impasse Jean Jaurès',
                    [
                        'Nantes',
                        'Reims',
                        'Saint-Denis',
                        'Villeurbanne',
                        'Le Havre',
                        'Rennes',
                        'Bordeaux',
                        'Nice',
                        'Dijon',
                        'Angers',
                        'Toulon',
                        'Lille',
                        'Saint-Etienne',
                        'Marseille',
                        'Strasbourg',
                        'Lyon',
                        'Montpellier',
                        'Toulouse',
                    ],
                ],
                [
                    $this->csv2,
                    '187 boulevard Jean Jaurès',
                    '106 avenue Léon Gambetta',
                    [
                        'Paris',
                        'Saint-Etienne',
                        'Toulon',
                        'Lyon',
                        'Le Havre',
                        'Angers',
                        'Rennes',
                        'Nantes',
                    ],
                ],
            ))
            ->then(function($data) {
                [$csv, $début, $fin, $expected] = $data;

                $villes = [];

                $this->assertSame($expected, $villes);
            });
    }

    public function testSiUnePersonneAyantAuMoins2FoisLeMêmePrénomEstNéeEn2019()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                [$this->csv1, false],
                [$this->csv2, true],
            ))
            ->then(function($data) {
                [$csv, $expected] = $data;

                $existe = null;

                $this->assertSame($expected, $existe);
            });
    }

    public function testLaPremièreFamilleDontPlusieursMembresSontDéfinisConsécutivement()
    {
        $this->markTestSkipped();
        $this
            ->forAll(Set\Elements::of(
                [$this->csv1, 'Martine, Louise Claude Suzanne Durand'],
                [$this->csv2, 'Bernard, Nathalie Isabelle Michel Michel'],
            ))
            ->then(function($data) {
                [$csv, $expected] = $data;

                $famille = '';

                $this->assertSame($expected, $famille);
            });
    }
}
