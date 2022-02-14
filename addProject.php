<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Add a project</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
    <body>
        <!-- BootStrap navBar edited to fit my layout
        https://getbootstrap.com/docs/4.0/components/navbar/-->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary my-8 my-lg-0">
        <section class="sectionOne">
            <a class="navbar-brand" href="#">Learning/Resource Tracker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addProject.php">Add Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addToLearn.php">Add a Hobby</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addResource.php">Add a Resource</a>
                </li>
            </form>
        </div>
        </section>
        </nav>
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