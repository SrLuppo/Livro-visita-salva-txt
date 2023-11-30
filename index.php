<?php
$fileName = 'livro-de-visitas.txt';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = strip_tags($_POST['name']);
    $message = strip_tags($_POST['message']);
    file_put_contents($fileName, '<b>' . $name . '</b>: ' . $message . "\n", FILE_APPEND);
}
$messages = file($fileName);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nameApp; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container px-5 my5">
        <h1>Livro de Visitas</h1>
        <form method="post" action="">
            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="name" value= "tes">
                <label for="newField">Name</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class = "form-control" type="text" name="message" style="height">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse sed corrupti, sint eum beatae quas culpa! Perspiciatis, iusto ratione atque sed non eveniet nulla, autem fuga facilis quos dolore in.
                </textarea>
                <label for="message">Message</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
            </div>
        </form>

        <hr>

        <h2>Messages(<?php echo count($messages)?>)  <?php echo date("d/m/Y")?> </h2>
        <?php if(empty($messages)): ?>
            <p>Não existem menssagens cadastradas</p>
        <?php else: ?>
            <ul>
                <?php foreach ($messages as $message): ?> 
                    <li><?php echo $message ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>

    </div>   
   
</body>
</html>