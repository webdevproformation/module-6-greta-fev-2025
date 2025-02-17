<main class="container">
    <h1>Nos dernières Recettes publiées :</h1>
    <section id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
    <?php foreach ( $recettes as $key => $recette ) : ?>
        <?php if($key === 0) : ?>
        <div class="carousel-item active">
            <img src="<?php echo $recette["url_img"] ?>" class="d-block w-100 object-fit-cover" height="400" alt="...">
        </div>
        <?php else : ?>
        <div class="carousel-item">
            <img src="<?php echo $recette["url_img"] ?>" class="d-block w-100 object-fit-cover" height="400" alt="...">
        </div>
        <?php endif ?>
        <?php endforeach ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </section>


    <section class="row">
        <?php foreach ( $recettes as $recette ) : ?>
            <div class="col-3 mb-4">
                <article class="card h-100" >
                    <a href="<?php echo URL ?>?page=single&id=<?php echo $recette["id"] ?>" >
                    <img src="<?php echo $recette["url_img"] ?>" alt="" class="card-img-top object-fit-cover" height="230" loading="lazy">
                    </a>
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="<?php echo URL ?>?page=single&id=<?php echo $recette["id"] ?>" class="link-dark">
                                <?php echo $recette["titre"] ?>
                            </a>
                        </h2>
                        <p class="card-text"><?php echo more($recette["description"]) ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center" >
                        <a href="<?php echo URL ?>?page=single&id=<?php echo $recette["id"] ?>"  class="link-dark icon-link icon-link-hover">
                            lire la suite 
                            <i class="bi bi-arrow-right-short"></i>
                        </a>
                        <span class="badge bg-warning"><?php echo $recette["categorie"] ?></span>
                    </div>
                </article>
            </div>
        <?php endforeach ?>

        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    
                    <?php for($i = 1 ; $i <=$max_page ; $i++) :?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo URL?>?id=<?php echo $i  ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                    <?php endfor ?>
                    
                </ul>
            </nav>
        </div>
    </section>
</main>