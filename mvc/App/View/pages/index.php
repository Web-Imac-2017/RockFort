<?php echo $content; var_dump($_SERVER['REQUEST_METHOD']); ?>

<br>
<br>

<?php var_dump($test); ?>


<ul>
<?php foreach($dab as $v): ?>

    <li><?= $v; ?></li>

<?php endforeach ?>
</ul>

<form action="posts/<?= $id; ?>" method="post">
    <input type="number" placeholder="GROS TEST nombre" name="id" value="<?= $id; ?>">
    <input type="submit" value="Valider">
</form>
