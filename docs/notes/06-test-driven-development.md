# Test Driven Development

## Spécifications 

Nous souhaitons pouvoir gérer des opérations entre montants de différentes devises :
- [ ] 5 USD + 10 EUR = 17 USD
- [ ] 1 USD + 1100 KRW = 2200 KRW

Nous avons besoin d'apporter un nouveau concept métier à notre code : un portefeuille (`Portfolio`).

Un portefeuille contient une **liste de montants de différentes devises**.

En prenant le premier exemple ci-dessus, il contiendrait `5 USD` et `10 EUR`.

Nous devons être capables d'**évaluer** le montant total du portefeuille, dans une **devise donnée**:
- `USD` => `17 USD`
- `EUR` => `14,1 EUR`
- `KRW` => `18940 KRW`
- etc.

Notre mission pour cette itération est d'implémenter la notion de portefeuille.

### Écrire un premier test : 5 USD + 10 EUR = 17 USD
- Écrire votre code en pratiquant le `Test Driven Development`.
- Prendre un peu de temps pour découvrir comment [générer votre code par l'usage](https://xtrem-tdd.netlify.app/Flavours/generate-code-from-usage).


### Rétrospective

> 3 faits et une question à propos du Test Driven Development

Le TDD consiste à écrire des tests automatisés avant de coder une fonctionnalité.

En 3 étapes : la rédaction d'un test qui échoue, l'écriture de code pour réussir le test, puis la refactorisation du code pour le rendre plus efficace et plus maintenable.

Les partisans du TDD soutiennent que cette pratique améliore la qualité du code en réduisant les bugs, en améliorant la conception et en encourageant une réflexion plus approfondie sur les exigences et les spécifications.

> Qu'avez-vous appris de l'introduction de nouveaux rôles en mob programming ?

L'une des principales leçons que nous avons appris de nouveaux rôles en mob programming est que cela peut aider à améliorer l'efficacité et la productivité de l'équipe. 