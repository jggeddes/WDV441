<html>
    <head>

        <style>

            #container{
                width: 90%;
                border: 2px solid black;
                padding: 10px;
                box-shadow: 5px;
                background-color: #f5f5f5;
                margin: auto;
            }

            h1{
                text-align: center;
            }

            form{
                text-align: center; 
            }

            span{
                color: red;
            }

            p{
                text-align: center;
            }

        </style>
    </head>
    <body>

    <h1>Update Article(s)</h1>


        <div id="container">

            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

                <?php if (isset($articleErrorsArray['articleTitle'])) { ?>
                    <div><?php echo $articleErrorsArray['articleTitle']; ?>
                <?php } ?>

                <label for='artlicleTitle'>Article Title:</label>    
                <input type="text" name="articleTitle" value="<?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?>"/><br>
                <p><span><?php echo $newsArticle->articleTitleErr; ?></span></p>

                <label for='artlicleContent'>Article Content:</label>    
                <textarea name="articleContent"><?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?></textarea><br>
                <p><span><?php echo $newsArticle->articleContentErr; ?></span></p>
                
                <label for='artlicleAuthor'>Article Author:</label>    
                <input type="text" name="articleAuthor" value="<?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?>"/><br>
                <p><span><?php echo $newsArticle->articleAuthorErr; ?></span></p>
                
                <label for='artlicleDate'>Article Date:</label>    
                <input type="text" name="articleDate" value="<?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?>"/><br>
                <p><span><?php echo $newsArticle->articleDateErr; ?></span></p>

                <input type="hidden" name="articleID" value="<?php echo (isset($articleDataArray['articleID']) ? $articleDataArray['articleID'] : ''); ?>"/>
                
                <input type="submit" name="Save" value="Save"/>
                <input type="submit" name="Cancel" value="Cancel"/>            
            </form>   

            <p>
                <a href="index.php">Home</a>
                <a href="article-edit.php">Add New Article</a>
            </p>

        </div>
    </body>
</html> 