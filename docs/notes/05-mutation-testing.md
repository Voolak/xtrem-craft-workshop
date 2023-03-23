# Mutation testing

## Code Coverage
Lancer une analyse du `code coverage` et discuter des résultats obtenus.

> Seriez-vous confiants pour remanier ce code avec la couverture actuelle ?

Si le code coverage est élevé, cela indique que la plupart des parties du code ont été exécutées lors des tests. Cependant, cela ne garantit pas que toutes les erreurs ont été détectées. Si le code coverage est faible, cela signifie que peu de parties du code ont été testées, ce qui peut indiquer des zones potentiellement dangereuses.
Ici, le pourcentage est élevé donc nous sommes plutôt confiant.

## Mutation Testing
Prendre un peu de temps pour découvrir le concept de [Mutation Testing](https://xtrem-tdd.netlify.app/Flavours/mutation-testing)
- Qu'avez-vous appris ?

Nous avons appris que c'est une technique de test qui consiste à créer des versions mutées du code source et à vérifier si les tests existants détectent ces mutations. L'objectif de la mutation testing est de s'assurer que les tests sont suffisamment robustes pour détecter des erreurs dans le code source.

- Mettez en place les outils nécessaires à une `analyse de mutants`
  - java => [pitest](https://pitest.org/)
  - csharp => [stryker.NET](https://stryker-mutator.io/docs/stryker-net/introduction/)
  - php => [infection](https://infection.github.io/guide/)
  - typescript => [stryker-js](https://stryker-mutator.io/docs/stryker-js/introduction/)
- Analyser les résultats obtenus

## La chasse aux mutants

En mob programming, appliquer les corrections nécessaires
