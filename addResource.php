<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <title>Add a resource</title>
      <!-- Bootstrap Link-->
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
         <h1>Add resources to help you learn</h1>
         <!-- Add a link that will be saved to the resource database -->
         <form method="POST" action="saveToResource.php">
            <fieldset class="col-md-4 form-group">
               <label for="hobbyId" class="control-label col-1">Link:</label>
               <input name="link" id="link" placeholder="Example: https://" class="form-control">
            </fieldset>
            <!-- Search through the hobbies table to associate a hobby to the link -->
            <fieldset class="col-md-4 form-group">
               <label for="hobbyId" class="control-label col-1">Hobby:</label>
               <select name="hobbyId" id="hobbyId" class="form-control">
               <?php
                  require 'db.php';
                  $sql = "SELECT * FROM hobbies";
                  
                  $cmd = $db->prepare($sql);
                  $cmd->execute();
                  $hobbies = $cmd->fetchAll();
                  
                  foreach ($hobbies as $hobby) {
                      echo '<option value="' . $hobby['hobbyId'] . '">' . $hobby['hobby'] . '</option>';
                  } 
                  
                  ?>
               </select>
               <!-- Search through the projects table to associate a project to the link -->
            </fieldset>
            <fieldset class="col-md-4 form-group">
               <label for="projectd" class="control-label col-1">Project:</label>
               <select name="projectId" id="projectId" class="form-control">
               <?php
                  require 'db.php';
                  $sql = "SELECT * FROM projects";
                  
                  $cmd = $db->prepare($sql);
                  $cmd->execute();
                  $projects = $cmd->fetchAll();
                  
                  foreach ($projects as $project) {
                      echo '<option value="' . $project['projectId'] . '">' . $project['project'] . '</option>';
                  }
                  
                  $db = null;
                  ?>
               </select>
            </fieldset>
            <button>Save</button>   
         </form>
   </body>
   </main>
</html>