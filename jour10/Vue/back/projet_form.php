<main class="container">
<h1>Créer une nouveau projet</h1>
    <section class="row">
        <div class="col-3">
            <?php include("menu-back.php") ?>
        </div>
        <div class="col-9">
            <form method="POST">
                <input type="hidden" name="id" value="">
                <div class="mb-3">
                    <label for="nom">nom du projet</label>
                    <input type="text" name="nom" class="form-control" id="nom" value="">
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="duree">duree</label>
                        <input type="number" name="duree" class="form-control" id="duree" value="">
                    </div>
                    <div class="col-6">
                        <label for="unite">unite</label>
                        <select name="unite" id="unite" class="form-select">
                            <option value="">choisir une valeur</option>
                            <option value="jour">jour</option>
                            <option value="semaine">semaine</option>
                            <option value="mois">mois</option>
                            <option value="année">année</option>
                        </select>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="php" name="php">
                    <label for="php" class="form-check-label">
                        PHP
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="php" name="js">
                    <label for="js" class="form-check-label">
                        JS
                    </label>
                </div>
            </form>
        </div>
    </section>
</main>