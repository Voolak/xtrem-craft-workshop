Story 1: Define Pivot Currency

### Définir une devise pivot

> Comment définir une devise pivot pour exprimer les taux de change ?

#### Règle Métier

Il faut définir une devise pivot pour pouvoir exprimer les taux de change basés sur cette devise.
La devise pivot est obligatoire et immuable.
Un taux de change, c'est un taux et une devise.

```gherkin
Given une devise pivot est définie comme étant USD,
When on exprime le taux de change entre EUR et KRW,
Then on l'exprime en utilisant USD comme devise pivot.
```

Story 2: Add an exchange rate

### Ajouter un taux de change

> Comment ajouter ou mettre à jour un taux de change en spécifiant le taux multiplicateur et la devise ?

#### Règle Métier

Il doit être possible d'ajouter ou de mettre à jour un taux de change en spécifiant le taux multiplicateur et la devise.
Si le taux de change existe déjà, il doit être mis à jour avec les nouvelles valeurs.
Il ne peut pas y avoir deux taux de change avec la meme devise.
Pas de ER avec la devise pivot. 

```gherkin
Given un taux de change EUR/USD existe déjà à 1.2,
When j'ajoute un taux de change KRW/USD à 1100,
Then le taux de change KRW/USD est ajouté et peut être utilisé pour exprimer le taux de change entre EUR et KRW.
```

Story 3: Convert a Money

### Convertir une somme d'argent

> Comment convertir une somme d'argent d'une devise à une autre ?

#### Règle Métier

Pas de devise inconnu de la banque sauf devise vers devise.
La conversion doit tenir compte de la devise pivot.
La précision de la conversion doit être d'au moins deux décimales.
Round triping sur une devise -> renvoie la meme somme 
Round triping sur deux devises -> renvoie à 0.01.

```gherkin
Given a bank with EUR as Pivot Currency
 And an Exchnage Rage of 1.235944 to USD
 And an Exchnage Rate of 0.12548966 to KRW
When I convert 10.254 KRW to USD 
Then I receive ... USD
```

```gherkin
Given a bank with EUR as Pivot Currency
 And an Exchnage Rage of 1.235944 to USD
 And an Exchnage Rate of 0.12548966 to KRW
When I convert 10.254 KRW to USD 
 And I convert the result back to KRW
Then I receive 10.254 +- 1%
```

```gherkin
Given a bank with EUR as Pivot Currency
When I convert 12.5 USD to USD 
 And I convert the result back to USD
Then I receive 12.5 USD
```