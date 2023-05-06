# Kata

Ce projet permet de s'entrainer à la manipulation de monades via la manipulation d'un fichier csv.

## Installation

```sh
make install
```

## Exercices

Pour lancer les exercices :

```sh
make test
```

Les exercices se trouvent dans le dossier `tests` où chaque test est un exercice. Par défaut tous les tests sont déclarés en _skipped_, pour commencer un exercice il faut enlever la ligne `$this->markTestSkipped();` et implémenter le test.

Pour chaque test plusieurs données d'entrées sont générées pour vraiment valider l'implémentation et s'assurer qu'aucun raccourci n'a été pris.

## Jeux de données

Les données sont générées aléatoirement, elles sont donc fictives et pas nécessairement cohérentes (un code postal ne correspond pas forcément à la ville associée).

Les 2 fichiers `data.csv` et `data-2.csv` ont la même structure et représentent une liste d'habitants français. Les fichiers comportent les colonnes :
- Titre
- Prénom
- Nom de famille
- Date de naissance
- Adresse
- Code postal
- Ville
