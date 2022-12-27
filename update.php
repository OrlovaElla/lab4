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
    $id = 0;
    $name = '';
    $cost = 0;
    $img = '';

    $xml = simplexml_load_file("data.xml") or die("Error: Cannot update object");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $img = $item->img;
                $name = $item->name;
                $cost = $item->cost;
                $node = $item;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $item->img = $_POST['img'];
                $item->name = $_POST['name'];
                $item->cost = $_POST['cost'];
                break;
            }
        }
        $xml->saveXML('data.xml');
    }
    ?>

     <form method="POST" action="update.php?id=<?= $id ?>">
        Название продукта: <input type="text" name="name" value="<?= $name ?>"/><br />
        Стоимость продукта: <input type="number" name="cost" value="<?= $cost ?>" /><br />
        Ссылка на изображение: <input type="text" name="img" value="<?= $img ?>" /><br />
        <input type="hidden" value="<?= $id ?>" name="id"/>
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