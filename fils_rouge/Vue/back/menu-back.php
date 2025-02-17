<!-- https://getbootstrap.com/docs/5.3/components/list-group/ -->  


<h2>Menu dashboard</h2>
<div class="list-group">
    <span class="list-group-item list-group-item-action">
    <i class="bi bi-person-circle"></i> <?php echo $_SESSION["user"]["email"] ?> <small><?php echo $_SESSION["user"]["role"] ?></small>
    </span>
    <a href="<?php echo URL ?>?page=admin/dashboard" class="list-group-item list-group-item-action">
        Accueil Back office
    </a>
    <a href="<?php echo URL ?>?page=admin/recettes" class="list-group-item list-group-item-action">
        Gestion des Recettes
    </a>
    <?php if ( isAdmin()  ) : ?>
    <a href="<?php echo URL ?>?page=admin/categories" class="list-group-item list-group-item-action">
        Gestion des Catégories
    </a>
    <a href="<?php echo URL ?>?page=admin/commentaires" class="list-group-item list-group-item-action">
        Gestion des Commentaires
    </a>
    <a href="<?php echo URL ?>?page=admin/user" class="list-group-item list-group-item-action">
        Gestion des Utilisateurs
    </a>
    <?php endif ?>
</div>
<!-- rdv 10h45 bonne pause !!! hello hello ! j'arrive tout de suite !! --> 


