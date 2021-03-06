<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= URL ?>css/app.css">
    <title>Rūbai</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <form action="<?= URL. $activeUrl ?>" method="get" class="m-3">
                    <fieldset>
                        <legend>Rūšiuoti</legend>
                        <div class="form-group">
                            <select name="sort" class="form-control">
                                <option value="default">Numatytasis rūšiavimas</option>
                                <option value="price_asc" <?= S('sort', 'price_asc') ?>>Pagal kainą nuo
                                    mažiausios</option>
                                <option value="price_desc" <?= S('sort', 'price_desc') ?>>Pagal kainą nuo
                                    didžiausios</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Filtruoti pagal tipą</legend>
                        <div class="form-group">
                            <select name="type" class="form-control">
                                <option value="default"> Nieko nepasirinkta </option>
                                <?php foreach ($types as $type) : ?>
                                <option value="<?= $type['type'] ?>" <?= S('type', $type['type']) ?>>
                                    <?= $type['type'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Filtruoti pagal tagą</legend>
                        <div class="form-group">
                            <select name="tag" class="form-control">
                                <option value="default"> Nieko nepasirinkta </option>
                                <?php foreach ($allTags as $tag) : ?>
                                <option value="<?= $tag['id'] ?>" <?= S('tag', $tag['id']) ?>>
                                    <?= $tag['title'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-secondary">Pritaikyti</button>
                    <a class="btn btn-secondary" href="<?= URL. $activeUrl ?>">Išvalyti</a>
                    <fieldset>
                        <legend>Paieška</legend>
                        <div class="form-group">
                            <input type="text" class="form-control" name="s" value="<?= $_GET['s'] ?? '' ?>">
                        </div>
                        <button class="btn btn-secondary" type="submit">Ieškoti</button>
                        <a class="btn btn-secondary" href="<?= URL. $activeUrl ?>">Išvalyti</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <span class="m-2">Viso skirtingų prekių: <?= $count ?></span>
            </div>
            <div class="col-12">
                <span class="m-2">Viso prekių: </span>
            </div>
            <?php require __DIR__ . '/pager.php' ?>
        </div>
    </div>