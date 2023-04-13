# Fight Primitive Obsession

Prendre quelques instants pour lire le contenu de la page [No Primitive Types](https://xtrem-tdd.netlify.app/Flavours/no-primitive-types).

> Quel concept implicite de notre base de code devrions-nous faire émerger ?

Le concept implicite que nous devrions faire émerger est celui de l'abstraction. Les types primitifs sont souvent utilisés dans le code comme des raccourcis, mais cela peut conduire à un code difficile à maintenir et à comprendre.

En utilisant des abstractions appropriées, nous pouvons rendre notre code plus expressif et plus facile à comprendre, ainsi qu'éviter les erreurs courantes telles que les erreurs de conversion de type. En identifiant les types primitifs fréquemment utilisés dans notre code et en les remplaçant par des types abstraits, nous pouvons améliorer la qualité de notre code et faciliter la maintenance.

## Nouveau concept : `Money`
Éliminer le code smell `Primitive Obsession` en introduisant le concept de `Money` à partir des tests, toujours en utilisant le `Test Driven Development`.
Partir des opérations de calcul, puis adapter le `Portfolio` et la `Bank` en utilisant ce nouvea `Value Object`.

### Contrainte

Lors de chaque rotation de mob programming, le `pilote` doit avoir un test rouge à disposition. 
