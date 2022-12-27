<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="delete.php">
        <input type="submit" value="Удаление элемента"/>
    </form>
    <form action="create.php">
        <input type="submit" value="Создание элемента"/>
    </form>
    <form method="GET" action="update.php">
        <input type="submit" value="Изменение элемента №"/>
        <input type="number" value="<?= $id ?>" name="id"/>
    </form>
</body>

</html>