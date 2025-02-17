<main class="container">
    <h1  class="mb-3"><i class="bi bi-speedometer"></i> Dashboard</h1>
    <section class="row">
        <div class="col-3">
            <?php include ("menu-back.php") ?>
        </div>
        <div class="col-9">
            <h2>Statistiques</h2>
            <div style="width: 800px;">
                <canvas id="graph" 
                data-recettes-publie="<?php echo $kpi["recettes-publie"][0]["total"] ?>"
                data-recettes-non-publie="<?php echo $kpi["recettes-non-publie"][0]["total"] ?>"
                data-commentaires-actif="<?php echo $kpi["commentaires-actif"][0]["total"] ?>"
                data-commentaires-inactif="<?php echo $kpi["commentaires-inactif"][0]["total"] ?>"
                data-users-admin="<?php echo $kpi["users-admin"][0]["total"] ?>"
                data-users-redacteur="<?php echo $kpi["users-redacteur"][0]["total"] ?>"
                data-categories="<?php echo $kpi["categories"][0]["total"] ?>"
                ></canvas>
            </div>
        </div>
    </section>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="public/chartjs.js"></script>