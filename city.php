<?php

if (isset($_POST['id'])) {
    require_once 'ItemRepository.php';
    $cityId = $_POST['id'];

    $itemRepository = new ItemRepository();
    $city = $itemRepository->getCityById($cityId);

    echo '
        <form method="post" action="cities.php">
            <input type="text" name="city-name" value="'. $city['name'] .'">
            <input type="hidden" name="city-id" value="'. $city['id'] .'">
            <button type="submit" name="btn-save" method="post">Ment</button>
            <button type="submit" name="btn-cancel" method="post">Mégse</button>
        </form>';
}
else{
    echo'
    <form method="post" action="cities.php">
            <input type="text" name="city-name" value="">
            <button type="submit" name="btn-save-new" method="post">Ment</button>
            <button type="submit" name="btn-cancel" method="post">Mégse</button>
        </form>';
}