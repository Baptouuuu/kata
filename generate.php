<?php

declare(strict_types = 1);

require 'vendor/autoload.php';

use Innmind\TimeContinuum\Format;
use Fixtures\Innmind\TimeContinuum\Earth\PointInTime;
use Innmind\BlackBox\{
    PHPUnit\BlackBox,
    Set,
};

$generate = new class {
    use BlackBox;

    public function __invoke(string $file): void
    {
        $data = \fopen($file, 'w');
        \fputcsv($data, ['Titre', 'Prénom', 'Nom', 'Date de naissance', 'Adresse', 'Code postal', 'Ville']);

        $this
            ->forAll(
                Set\Elements::of('Mr', 'Monsieur', 'Mme', 'Madame', 'Mlle', 'Mademoiselle'),
                Set\Sequence::of(
                    // @see https://fr.wikipedia.org/wiki/Liste_des_prénoms_les_plus_donnés_en_France
                    Set\Elements::of(
                        'Marie',
                        'Jeanne',
                        'Françoise',
                        'Monique',
                        'Catherine',
                        'Nathalie',
                        'Isabelle',
                        'Jacqueline',
                        'Sylvie',
                        'Anne',
                        'Martine',
                        'Madeleine',
                        'Nicole',
                        'Suzanne',
                        'Hélène',
                        'Christine',
                        'Louise',
                        'Marguerite',
                        'Denise',
                        'Christiane',
                        'Jean',
                        'Pierre',
                        'Michel',
                        'André',
                        'Philippe',
                        'Louis',
                        'René',
                        'Alain',
                        'Jacques',
                        'Bernard',
                        'Marcel',
                        'Daniel',
                        'Roger',
                        'Paul',
                        'Robert',
                        'Claude',
                        'Henri',
                        'Christian',
                        'Nicolas',
                        'Georges',
                    ),
                    Set\Integers::between(1, 3),
                ),
                Set\Sequence::of(
                    // @see https://fr.wikipedia.org/wiki/Liste_des_noms_de_famille_les_plus_courants_en_France
                    Set\Elements::of(
                        'Martin',
                        'Bernard',
                        'Thomas',
                        'Petit',
                        'Robert',
                        'Richard',
                        'Durand',
                        'Dubois',
                        'Moreau',
                        'Laurent',
                        'Simon',
                        'Michel',
                        'Lefebvre',
                        'Leroy',
                        'Roux',
                        'David',
                        'Bertrand',
                        'Morel',
                        'Fournier',
                        'Girard',
                    ),
                    Set\Integers::between(1, 2),
                ),
                PointInTime::after('1900-01-01')->filter(static fn($point) => $point->year()->toInt() <= 2020),
                Set\Composite::immutable(
                    static fn(...$args) => \implode(' ', $args),
                    Set\Integers::between(1, 200),
                    Set\Elements::of('rue', 'avenue', 'boulevard', 'impasse'),
                    // @see https://www.lebonguide.com/article/les-noms-les-plus-donnes-aux-rues-francaises_a799222
                    Set\Elements::of(
                        'Charles de Gaulle',
                        'Louis pasteur',
                        'Victor Hugo',
                        'Jean Jaurès',
                        'Jean Moulin',
                        'Léon Gambetta',
                        'Général Leclerc',
                        'Maréchal Foch',
                        'Jules Ferry',
                        'Georges Clémenceau',
                    ),
                ),
                Set\Decorate::immutable(
                    static fn($code) => str_pad((string) $code, 5, '0', \STR_PAD_LEFT),
                    Set\Integers::between(1000, 99999),
                ),
                // @see https://fr.wikipedia.org/wiki/Liste_des_communes_de_France_les_plus_peuplées
                Set\Elements::of(
                    'Paris',
                    'Marseille',
                    'Lyon',
                    'Toulouse',
                    'Nice',
                    'Nantes',
                    'Montpellier',
                    'Strasbourg',
                    'Bordeaux',
                    'Lille',
                    'Rennes',
                    'Reims',
                    'Toulon',
                    'Saint-Etienne',
                    'Le Havre',
                    'Dijon',
                    'Grenoble',
                    'Angers',
                    'Villeurbanne',
                    'Saint-Denis',
                ),
            )
            ->take(10000)
            ->then(function($titre, $prénoms, $noms, $point, $rue, $codePostal, $ville) use ($data) {
                \fputcsv($data, [
                    $titre,
                    \implode(' ', $prénoms),
                    \implode('-', $noms),
                    $point->format(new class implements Format {
                        public function toString(): string
                        {
                            return 'Y-m-d';
                        }
                    }),
                    $rue,
                    $codePostal,
                    $ville,
                ]);
            });
    }
};

$generate('data.csv');
$generate('data-2.csv');
