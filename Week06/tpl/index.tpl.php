<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Articles</title>
</head>
<body>
    <h1 style="text-align: center;">News Articles</h1>
    <?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ ?>

    <div style="padding: 10px; text-align: left; border: 2px solid black; background-color: #f5f5f5; margin: auto; width: 50%;">              
        TITLE: <?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : $row['articleTitle']); ?><br>
        CONTENT: <?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : $row['articleContent']); ?><br>
        AUTHOR: <?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : $row['articleAuthor']); ?><br>
        DATE: <?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : $row['articleDate']); ?><br>
        <a href="article-view.php">View</a>
        <a href="article-edit.php">Edit</a>
    </div>

    <?php } ?>
</body>
</html>