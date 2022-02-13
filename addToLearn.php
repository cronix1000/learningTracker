<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Add something to learn</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
    <body>
        <main class="container">
        <h1>Add something to learn</h1>
        <!-- call the saveToLearn.php and parse the input data -->
        <form method="post" action="saveToLearn.php">
            <fieldset class="col-md-4 form-group">        
                <label for="toLearn" class="control-label"></label>
                <input name="toLearn" id="toLearn" type="text" class="form-control" placeholder="Add something to learn" aria-label="Username" aria-describedby="basic-addon1">
            </fieldset>
            
            <button>Save</button>
        </form>
    </body>
</main>
</html>