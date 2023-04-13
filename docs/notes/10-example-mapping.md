Story 1: Define Pivot Currency

Titre : Définir une devise pivot

Question : Comment définir une devise pivot pour exprimer les taux de change ?

Règle Métier :

Il doit être possible de définir une devise pivot pour pouvoir exprimer les taux de change basés sur cette devise.
Exemple :

Given une devise pivot est définie comme étant USD,
When on exprime le taux de change entre EUR et JPY,
Then on l'exprime en utilisant USD comme devise pivot.

Story 2: Add an exchange rate

Titre : Ajouter un taux de change

Question : Comment ajouter ou mettre à jour un taux de change en spécifiant le taux multiplicateur et la devise ?

Règle Métier :

Il doit être possible d'ajouter ou de mettre à jour un taux de change en spécifiant le taux multiplicateur et la devise.
Si le taux de change existe déjà, il doit être mis à jour avec les nouvelles valeurs.
Exemple :

Given un taux de change EUR/USD existe déjà à 1.2,
When j'ajoute un taux de change JPY/USD à 0.009,
Then le taux de change JPY/USD est ajouté et peut être utilisé pour exprimer le taux de change entre EUR et JPY.

Story 3: Convert a Money

Titre : Convertir une somme d'argent

Question : Comment convertir une somme d'argent d'une devise à une autre ?

Règle Métier :

Il doit être possible de convertir une somme d'argent d'une devise à une autre en utilisant les taux de change appropriés.
La conversion doit tenir compte de la devise pivot, s'il en existe une.
La précision de la conversion doit être d'au moins deux décimales.
Exemple :

Given un taux de change EUR/USD à 1.2 et un taux de change JPY/USD à 0.009,
When je convertis 100 EUR en JPY,
Then le résultat doit être égal à 13 333 JPY (arrondi à la deuxième décimale).