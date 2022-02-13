<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Add a project</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
    <body>
    <main class="container">
        <h1>Add a project</h1>
        <!-- call the saveProject.php and parse the input data -->
        <form method="post" action="saveProject.php">
        <fieldset class="col-md-4 form-group">  
                <label for="project" class="control-label"></label>
                <input name="project" id="project" class="form-control" placeholder="Add a project">
            </fieldset>
            <button>Save</button>
        </form>
    </body>
</main>
</html>