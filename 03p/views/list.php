<?php require __DIR__ . '/top.php' ?>

<div class="container">
    <div class="row">
        <?php $currentOutfit = '' ?>
        <?php foreach($outfits as $index => $outfit) : ?>
        <!-- prekes pradzia -->
        <?php if ($currentOutfit != $outfit['color'].$outfit['type']): ?>
        <div class="col-4">
            <div class="card m-2">
                <div class="card-body">
                    <h5 class="card-title"><?= $outfit['color'] ?> <?= $outfit['type'] ?></h5>
                    <p class="card-text">Kaina: <?= $outfit['total_price'] ?> <del><?= $outfit['price'] ?></del></p>
                    <form action="<?= URL. 'pirkti' ?>" method="post">
                    <div class="form-group">
                        <select name="size" class="form-control">
                            <?php endif ?>
                            <option value="<?= $outfit['size'] ?>"><?= $outfit['size'] ?> Liko: <?= $outfit['amount'] ?>
                            </option>
                            <?php if (!isset($outfits[$index + 1]) || $outfits[$index + 1]['color'].$outfits[$index + 1]['type'] != $outfit['color'].$outfit['type']): ?>
                        </select>
                    </div>
                        <button class="btn btn-primary" name="id" value="<?= $outfit['id'] ?>">Pirkti</button>
                        <input type="text" style="width:30px;" name="count">
                    </form>
                </div>
            </div>
        </div>
        <?php endif ?>
        <?php $currentOutfit = $outfit['color'].$outfit['type'] ?>
        <!-- prekes pabaiga -->
        <?php endforeach ?>
    </div>
</div>

<?php require __DIR__ . '/bottom.php' ?>