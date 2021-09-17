<?php require __DIR__ . '/top.php' ?>

<div class="container">
    <div class="row">
        <?php foreach($outfits as $outfit) : ?>
        <div class="col-4">
            <div class="card m-2">
                <div class="card-body">
                    <h5 class="card-title"><?= $outfit['color'] ?> <?= $outfit['type'] ?></h5>
                    <p class="card-text">Kaina: <?= $outfit['total_price'] ?> <del><?= $outfit['price'] ?></del></p>
                    <form action="<?= URL. 'pirkti' ?>" method="post">
                    <button class="btn btn-primary" name="id" value="<?= $outfit['id'] ?>">Pirkti</button>
                    <input type="text" style="width:30px;" name="count">
                    </form>
                    
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

<?php require __DIR__ . '/bottom.php' ?>