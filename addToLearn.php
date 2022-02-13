<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Genre Details</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
    <body>
        <main class="container">
        <h1>Add something to learn</h1>
        <form method="post" action="saveToLearn.php">
            <fieldset class="input-group m-1">        
                <label for="toLearn" class="control-label"></label>
                <input name="toLearn" id="toLearn" type="text" class="form-control col-2" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </fieldset>
            
            <button>Save</button>
        </form>
    </body>
</main>
</html>