<main class="container">
    <?php $etudiant = $page_appelee["etudiant"] ?>
    <h1><?php echo $etudiant ?></h1>
    <?php $etudiant = $annuaire[$etudiant] ?>
    <ul>
        <li>📱 : <?php echo $etudiant["phone"] ?></li>
        <li>📧 : <?php echo $etudiant["email"] ?></li>
        <li>📍 : <?php echo $etudiant["adresse"][0] . " " . $etudiant["adresse"][1]  . " " . $etudiant["adresse"][2] ?> </li>
    </ul>
</main>