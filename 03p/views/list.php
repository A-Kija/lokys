<?php require __DIR__ . '/top.php' ?>

<div class="container">
    <div class="row">
        <?php foreach($outfits as $outfit) : ?>
        <div class="col-4">
            <div class="card m-2">
                <div class="card-body">
                    <h5 class="card-title"><?= $outfit['spalva'] ?> <?= $outfit['rubas'] ?></h5>
                    <p class="card-text">Dydis: <?= $outfit['dydis'] ?></p>
                    <p class="card-text">Kaina: <?= $outfit['pardavimo_kaina'] ?> <del><?= $outfit['kaina'] ?></del></p>
                    <p class="card-text">Viso yra: <?= $outfit['kiekis'] ?></p>

                    <form action="<?= URL. 'pirkti' ?>" method="post">
                    <button class="btn btn-primary" name="id" value="<?= $outfit['id'] ?>">Pirkti</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

<?php require __DIR__ . '/bottom.php' ?>