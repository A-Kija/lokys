<ul>
<?php foreach($trees as $tree) : ?>
    <li>
    ID: <?= $tree['id'] ?> <b><?= $tree['title'] ?></b> <?= $tree['height'] ?> <?= $tree['type'] ?>
    </li>
<?php endforeach ?>
</ul>