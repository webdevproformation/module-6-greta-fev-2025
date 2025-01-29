## des questions ???

- qu'est ce qu'il faut mettre en début de fichier php pour que le typage soit strict ?? 

```php
<?php 
declare(strict_types = 1); 
// cette instruction qui permet de faire en sorte que le typehint
// soit strict
function calcul(int $a , int $b)
{
}
```
// https://github.com/webdevproformation/module-6-greta-fev-2025

=> réponse sur le discord en message privé ?? 

- pouvez vous me donner 3 manières exécuter une fonction en PHP ?
- => mettre la réponse en message privé sur discord 

```php 
<?php 
// créer la fonction 
declare(strict_types = 1);

function plus(int $a , string $b){ }

// exécuter la fonction en PHP il existe 4 manières 
// 1
plus(1,"texte"); // classique
// 2
$traitement = "plus"; // variable de fonction 
$traitement(2, "texte");
// 3
call_user_func("plus" , 3, "autre"); // via une fonction de PHP
// 4
call_user_func_array("plus" , [2,"fin"]); // via une fonction de PHP
```

- allez sur le site internet de php.net
- <https://www.php.net/manual/en/function.array-map.php>
- le mode d'emploi de la fonction array_map
- expliquer ce que veut dire 
- `array_map(?callable $callback, array $array, array ...$arrays): array`

- une fonction de native de PHP comme "echo" "for" "if" "else"   
- array_map est aussi qui vient de PHP qui est directement disponible

- synopsys de la fonction => en 1 ligne vous avez le mode d'emploi
- au minimum 2 paramètres OBLIGATOIRE pour la fonction 
- mais vous pouvez en mettre plus 
- le 1er paramètre est callable => fonction ou null
- le 2ème paramètre est un tableau 
- les autres paramètre (si vous les mettez) doivent être des tableaux

- : array => cette fonction retourne obligatoirement un tableau 
- prendre un ou plusieurs tableaux  => retourner un nouveau tableau 

[ etudiants => age   ] 
générer un nouveau tableau  [ etudiants => age , isMineur => TRUE / FALSE  ]