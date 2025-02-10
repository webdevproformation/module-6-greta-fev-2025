<main class="container">
    <h1>Je suis la page de présentation</h1>
    <p>voici l'ensemble des projets que j'ai réalisés :</p>
    <section class="row">
        <?php foreach ($projets as $projet ) : ?>
            <div class="col-3">
                <article class="card">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $projet["nom"] ?></h2>
                        <p class="card-text">durée : <?php echo $projet["duree"] . " " .$projet["unite"] ?></p>
                    </div>
                    <div class="card-footer">
                        <?php foreach($projet["technos"] as $techno) : ?>
                            <span class="badge bg-primary me-2"><?php echo $techno ?></span>
                        <?php  endforeach ?>
                    </div>
                </article>
            </div>
        <?php endforeach ?>
    </section>
</main>