<?php require __DIR__ . '/top.php' ?>
<ul>
<?php foreach($outfits as $outfit) : ?>
    <li>
    <?= $outfit['id'] ?? '' ?> <b><?= $outfit['rubas'] ?></b> <?= $outfit['dydis'] ?> <?= $outfit['spalva'] ?> <?= $outfit['kaina'] ?> EUR
    </li>
<?php endforeach ?>
</ul>
<?php require __DIR__ . '/bottom.php' ?>





