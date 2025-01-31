<main class="container">

    <h1> page d'accueil </h1>
    <p>liste des pays visités :</p>
    <ul>
    <!-- $pays est une variable globale qui vient du fichier index.php -->
    <?php foreach( $pays as $cle => $valeur ) : ?>
        <li><?php echo $cle ?></li>
    <?php endforeach ?>
    </ul>

</main>