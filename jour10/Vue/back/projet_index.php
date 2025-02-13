<main class="container">
    <h1>Gestion des projets</h1>
    <section  class="row">
        <div class="col-3">
            <?php include ("menu-back.php") ?>
        </div>
        <div class="col-9">
            <?php if(isset($_SESSION["flash"])) : ?>
                <div class="alert bg-success text-white"><?php echo flash() ?> </div>
            <?php endif ?>
            <a href="http://192.168.33.10/jour10/index.php?page=admin/projet/new" class="btn btn-primary mb-3">Ajouter un nouveau projet</a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>nom</th>
                        <th>duree</th>
                        <th>unité</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $projets as $projet ) : ?>
                        <tr>
                            <td><?php echo $projet["id"] ?></td>
                            <td><?php echo $projet["nom"] ?></td>
                            <td><?php echo $projet["duree"] ?></td>
                            <td><?php echo $projet["unite"] ?></td>
                            <td>
                                <a href="http://192.168.33.10/jour10/index.php?page=admin/projet/update&id=<?php echo $projet["id"] ?>" class="btn btn-secondary me-3  btn-sm">update</a>
                                <a href="http://192.168.33.10/jour10/index.php?page=admin/projet/delete&id=<?php echo $projet["id"] ?>" class="btn btn-danger btn-sm">delete</a>
                            </td>
                        </tr>
                        <!-- google => 3w validator -->
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</main>