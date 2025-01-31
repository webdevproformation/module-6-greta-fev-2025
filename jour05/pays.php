<?php // var_dump($page_appelee["pays"]) ?>

<?php if($page_appelee["pays"] == "fr") : ?>
    <h1>Villes visitées en France</h1>
<?php elseif($page_appelee["pays"] == "es") : ?>
    <h1>Villes visitées en Espagne</h1>
<?php endif ?>
<p>J'ai visité les villes suivantes :</p>

<?php $pays_visite = $page_appelee["pays"] == "fr" ? "France" : "Espagne"  ?>

<ul>
    <?php  foreach( $pays[$pays_visite] as $ville ) :?>
        <li><?php echo $ville ?></li>
    <?php endforeach ?>
</ul>