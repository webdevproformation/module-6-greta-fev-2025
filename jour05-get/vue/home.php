<main class="container">
<h1>Accueil</h1>
<p>liste des étudiants dans l'annuaire :</p>
<section class="row">
<?php foreach( $annuaire as $etudiant => $infos ) : ?>
    <div class="col-3">
        <article class="card">
            <img src="https://picsum.photos/300/200" alt="">
            <h2 class="card-title"><?php echo $etudiant ?></h2>
        </article>
    </div>
<?php endforeach ?>
</section>
</main>
