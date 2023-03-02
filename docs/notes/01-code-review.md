# Code review

## Tâches

> Réaliser une revue de code en équipe du code et des tests

- Que cherchons-nous ?
  - comprendre le fonctionnel
  - des code smells
  - de mauvais nommages
  - de la duplication
  - des incohérences
  - ...

> Partager le résultat dans un backlog d'amélioration continue

Sur votre dépôt de code, ajouter une issue par point d'amélioration, cette base sera utile pour la suite

# Bedouret Romain - Choplin Alexandre - Barzana Andgel

 - Fonctionnel :
  - Bank.php gère le taux d'échange entre les différentes monnaies renseignées dans Currency.php
    - Ajoute un nouveau taux d'échange
    - Convertir des monnaies selon le taux d'échange
  - MoneyCalculator.php additionne, multiplie et divise un type de monnaie

 - Tests :
  - Le nom de certains tests sont incohérents et ne corespond pas à ce qu'ils testent
  - Ils couvrent


Problemes indentation
Commentaires en trop