
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php foreach($products as $product){ ?>
        
       <div>Title-<?php echo $product['title']; ?></div>
       <div>Description-<?php echo $product['description']; ?></div>
         <?php } ?>
</body>
</html>