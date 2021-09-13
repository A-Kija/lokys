<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rūbai</title>
</head>
<body>
    <form action="<?= URL. 'sarasas' ?>" method="get">
    <fieldset>
        <legend>Rūšiuoti</legend>
        <button type="submit" name="sort_price_asc">Pagal kainą nuo mažiausios</button>
        <button type="submit" name="sort_price_desc">Pagal kainą nuo didžiausios</button>
        <a href="<?= URL. 'sarasas' ?>">Išvalyti</a>
    </fieldset>
    </form>
    
    <form action="<?= URL. 'sarasas' ?>" method="get">
    <fieldset>
        <legend>Filtruoti pagal tipą</legend>
        <select name="rubas">
        <option value=""> Nieko nepasirinkta  </option>
        <?php foreach ($types as $type) : ?>
            <?php $selected = ($_GET['rubas'] ?? '') == $type['rubas'] ? 'selected' : '' ?>
            <option value="<?= $type['rubas'] ?>" <?= $selected ?>>
                <?= $type['rubas'] ?>
            </option>
        <?php endforeach ?>
        </select>
        <button type="submit" name="filter_by_type">Rodyti</button>
    </fieldset>
    

    </form>