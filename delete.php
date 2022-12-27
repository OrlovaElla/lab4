<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $xml = simplexml_load_file("data.xml") or die("Error: Cannot delete object");
        $id = $_POST['id'];
        $i = 0;
        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                unset($xml->item[$i]);
                break;
            }
            $i++;
        }        
        $j = 1;
        foreach ($xml->item as $item) {
            if ($item['id'] != $j) {
                $item['id'] = $j;
            }
            $j++;
        }
        $xml->saveXML('data.xml');
    }
    ?>
    <form method="POST" action="delete.php">
        id: <input type="number" name="id" value="<?= $id ?>"/><br />
        <input type="submit" value="Сохранить" />
    </form>
    <form action="list.php">
        <input type="submit" value="Назад"/>
    </form>
    <form action="index.php">
        <input type="submit" value="Посмотреть страницу"/>
    </form>
</body>

</html>