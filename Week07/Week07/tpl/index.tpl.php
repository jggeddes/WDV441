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
     <?php //foreach($articleList as $articleData){ ?>
    <div style="padding: 10px; text-align: left; border: 2px solid black; background-color: #f5f5f5; margin: auto; width: 50%;">              
        <div>TITLE: <?php //echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : $articleData['articleTitle']); ?></div>
        CONTENT: <?php //echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : $articleData['articleContent']); ?><br>
        DATE: <?php //echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : $row['articleDate']); ?><br>
        <a href="../public/article-view.php">View</a>
        <a href="../public/article-edit.php">Edit</a>
    </div>
    <?php// } ?>
</body>
</html>