<main class="container">
    <h1  class="mb-3"> <i class="bi bi-chat-left-dots-fill"></i> Modération des commentaires</h1>
    <section  class="row">
        <div class="col-3">
            <?php include ("menu-back.php") ?>
        </div>
        <div class="col-9">
            <?php if(isset($_SESSION["flash"])) : ?>
                <div class="alert bg-success text-white"><?php echo flash() ?> </div>
            <?php endif ?>

            <table class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>email</th>
                        <th>message</th>
                        <th>active</th>
                        <th>recette associée</th>
                        <th>créé le</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $commentaires as $commentaire ) : ?>
                        <tr>
                            <td><?php echo $commentaire["id"] ?></td>
                            <td><?php echo $commentaire["email"] ?></td>
                            <td><?php echo more($commentaire["message"]) ?></td>
                            <td  class="text-center"><?php echo $commentaire["is_active"] == 1 ? "✅" : "❌" ?></td>
                            <td><?php echo more($commentaire["titre"]) ?></td>
                            <td><?php echo more($commentaire["dt_creation"]) ?></td>
                            <td style="width:155px">
                                <a href="<?php echo URL ?>?page=admin/commentaires/update&id=<?php echo $commentaire["id"] ?>" class="btn btn-secondary me-3  btn-sm">update</a>
                                <a href="<?php echo URL ?>?page=admin/commentaires/delete&id=<?php echo $commentaire["id"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('êtes vous sûr de vouloir supprimer?')">delete</a>
                            </td>
                        </tr>
                        <!-- google => 3w validator -->
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</main>