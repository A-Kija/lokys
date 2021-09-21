<?php require __DIR__ . '/top2.php' ?>

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
                    <p class="card-text">Galutinė Kaina: <?= $outfit['total_price'] ?></p>
                    <form action="<?= URL.'update/'.$outfit['id'] ?>" method="post">

                        <div class="form-group">
                            <label>Kaina:</label>
                            <input type="text" class="form-control" name="price" value="<?= $outfit['price'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Nuolaida:</label>
                            <input type="text" class="form-control" name="discount" value="<?= $outfit['discount'] ?>">
                        </div>


                        <?php endif ?>

                        <?php if(isset($outfit['size'])) : ?>
                        <div class="form-group">
                            <label><?= $outfit['size'] ?> kiekis:</label>
                            <input type="text" class="form-control" name="size[<?= $outfit['size'] ?>]" value="<?= $outfit['amount'] ?>">
                            <input type="checkbox" name="delete_size[]" value="<?= $outfit['size'] ?>"> Trinti
                        </div>
                        <?php endif ?>


                        <?php if (!isset($outfits[$index + 1]) || $outfits[$index + 1]['color'].$outfits[$index + 1]['type'] != $outfit['color'].$outfit['type']): ?>

                        <button class="btn btn-primary">Redaguoti</button>
                    </form>
                    <form action="<?= URL.'new-size/'.$outfit['id'] ?>" method="post" class="mt-5">
                        <div class="form-group">
                            <label>Naujas Dydis:</label>
                            <input type="text" class="form-control" name="new_size">
                        </div>
                        <button class="btn btn-primary">Pridėti dydį</button>
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

<?php require __DIR__ . '/bottom2.php' ?>