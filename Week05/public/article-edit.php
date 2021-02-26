<?php
// usage: http://localhost:8888/WDV441/Week05/public/article-edit.php?articleID=1
// usage new: http://localhost:8888/WDV441/Week05/public/article-edit.php
require_once('../inc/NewsArticles.class.php');

// create an instance of our class so we can use it
$newsArticle = new NewsArticles();

// initialize some variables to be used by our view
$articleDataArray = array();
$articleErrorsArray = array();
$newsArticle->getArticles();

// load the article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0) {
    $newsArticle->load($_REQUEST['articleID']);
    // set our article array to our local variable
    $articleDataArray = $newsArticle->articleData;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    // sanitize and set the post array to our local variable
    $articleDataArray = $newsArticle->sanitize($_POST);
    // pass the array into our instance
    $newsArticle->set($articleDataArray);
    
    // validate
    if ($newsArticle->validate()) {
        // save
        if ($newsArticle->save()) {
            header("location: article-save-success.php");
            exit;
        } else {
            $articleErrorsArray[] = "Save failed";
        }
    } else {
        $articleErrorsArray = $newsArticle->errors;
        $articleDataArray = $newsArticle->articleData;
    }
}

?>
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