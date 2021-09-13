<ul>
<?php foreach($outfits as $outfit) : ?>
    <li>
    ID: <?= $outfit['id'] ?> <b><?= $outfit['rubas'] ?></b> <?= $outfit['dydis'] ?> <?= $outfit['spalva'] ?> <?= $outfit['kaina'] ?> EUR
    </li>
<?php endforeach ?>
</ul>

