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
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$img = $_POST['img'];
			$name = $_POST['name'];
			$price = $_POST['price'];
			$xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
			$task = $xml->addChild('item', '');
			$task->addChild('img', $img);
			$task->addChild('name', $name);
			$task->addChild('price', $price);
			$task->addAttribute('id', $xml->count());
	        $xml->saveXML('data.xml');
		} 
	?>

	<form method="POST" action="create.php">
        Название: <input type="text" name="name" /><br />
        Стоимость: <input type="number" name="price" /><br />
        Ссылка на изображение: <input type="text" name="img" /><br />
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
