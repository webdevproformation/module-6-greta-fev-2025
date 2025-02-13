<main class="container">
    <h1>Gestion des profils utilisateurs</h1>
    <section class="row">
        <div class="col-3">
            <?php include("menu-back.php") ?>
        </div>
        <div class="col-9">
            <a href="<?php echo URL ?>?page=admin/user/new" class="btn btn-primary mb-3">Ajouter un nouveau profil utilisateur</a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>email</th>
                        <th>role</th>
                        <th>date création</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user) : ?>
                        <tr>
                            <td><?php echo $user["id"] ?></td>
                            <td><?php echo $user["email"] ?></td>
                            <td><?php echo $user["role"] ?></td>
                            <td><?php echo $user["dt_creation"] ?></td>
                            <td>
                                <a href="<?php echo URL ?>?page=admin/user/update&id=<?php echo $user["id"]?>" class="btn btn-secondary btn-sm me-3">
                                    update
                                </a>
                                <a href="<?php echo URL ?>?page=admin/user/delete&id=<?php echo $user["id"]?>" class="btn btn-danger btn-sm">
                                    delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</main>