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
