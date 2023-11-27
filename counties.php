<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font_awsome/4.7.0/css/font-awsome.min.css">
    <title>Megyék</title>
</head>
<body>
    <a href="./index.php"><i class="fa fa-home"></i>vissza</a>
    <h1>Megyék</h1>
<table>
    <thead>
        <th>#id</th><th>Megnevezés</th><th>Művelet&nbsp;<button><a href="./county.php"><i class="fa fa-plus"></i>+</a></button></th>
    </thead>
    <tbody>
    <form method="post" action="counties.php">
            <input type="text" name="needle" value="">
            <button type="submit" name="btn-search" method="post">Keres</button>
        </form>
    <?php
        require_once("./ItemRepository.php");
        $itemRepository = new ItemRepository();

        if (isset($_POST['btn-cancel'])){
            //do nothing
        }
        if (isset($_POST['btn-save'])) {
            $countyName = $_POST['county-name'];
            $countyId = $_POST['county-id'];

            $itemRepository->updateCounty($countyId, $countyName);
        }
        if (isset($_POST['btn-save-new'])) {
            $countyName = $_POST['county-name'];

            $itemRepository->saveCounty($countyName);
        }
        if (isset($_POST['btn-search'])) {
            $countyName = $_POST['needle'];

            $counties = $itemRepository->searchCounty($countyName);
        }
        if (!isset($counties)){
            $counties = $itemRepository->getAllCounties();
        }

        foreach ($counties as $county) {
            echo ''
            . '<tr>'
                . '<td>' . $county["id"] . '</td>'
                . '<td>' . $county["name"] . '</td>'
                .'<td><div style="display: flex">'
                    .'<form method="post" action="county.php">
                        <button type="submit">
                            <i class="fa fa-pancil">Módosítás</i>
                        </button>
                        <input type="hidden" name="id" value="'. $county['id'] . '">
                    </form>'
                    
                . '</div></td>'
             .'</tr>';
         }
    ?>
    </tbody>
</table>
</body>
</html>