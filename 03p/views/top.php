<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Rūbai</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <form action="<?= URL. 'sarasas' ?>" method="get" class="m-3">
                    <fieldset>
                        <legend>Rūšiuoti</legend>
                        <button class="btn btn-secondary" type="submit" name="sort_price_asc">Pagal kainą nuo
                            mažiausios</button>
                        <button class="btn btn-secondary" type="submit" name="sort_price_desc">Pagal kainą nuo
                            didžiausios</button>
                        <a class="btn btn-secondary" href="<?= URL. 'sarasas' ?>">Išvalyti</a>
                    </fieldset>
                </form>
            </div>
            <div class="col-4">
                <form action="<?= URL. 'sarasas' ?>" method="get" class="m-3">
                    <fieldset>
                        <legend>Filtruoti pagal tipą</legend>
                        <div class="form-group">
                            <select name="rubas" class="form-control">
                                <option value=""> Nieko nepasirinkta </option>
                                <?php foreach ($types as $type) : ?>
                                <?php $selected = ($_GET['rubas'] ?? '') == $type['rubas'] ? 'selected' : '' ?>
                                <option value="<?= $type['rubas'] ?>" <?= $selected ?>>
                                    <?= $type['rubas'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button class="btn btn-secondary" type="submit" name="filter_by_type">Rodyti</button>
                    </fieldset>
                </form>
            </div>

            <div class="col-6">
                <form action="<?= URL. 'sarasas' ?>" method="get" class="m-3">
                    <fieldset>
                        <legend>Filtruoti pagal dydį</legend>
                        <div class="container">
                            <div class="row">
                                <?php foreach ($sizes as $size) : ?>
                                <div class="col-1">
                                    <input type="checkbox" name="size[]" value="<?= $size['dydis'] ?>"
                                     <?php if (isset($_GET['size']) && in_array($size['dydis'], $_GET['size'])) echo 'checked' ?>>
                                    <label>
                                        <?= $size['dydis'] ?>
                                    </label>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <button class="btn btn-secondary" type="submit" name="filter_by_size">Rodyti</button>
                    </fieldset>
                </form>
            </div>


        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <span class="m-2">Viso prekių: <?= $count ?></span>
            </div>
            <?php require __DIR__ . '/pager.php' ?>
        </div>
    </div>