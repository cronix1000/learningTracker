<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Learning/Resource Tracker</title>
        <!--Bootstrap-->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <script type="text/javascript" src="main.js"></script>
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
                    <a class="nav-link" href="#">Home</a>
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
        <section class="container bg-light"> 
        <main class="container">
        <h1>Learning/Resource Tracker</h1>
        <!-- Table for Hobby and its associated resources -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Hobby</th>
                    <th>Resources</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                // connect
                require 'db.php';

                // set up & run query
                // Query for hobbies and the resource associated by comparing hobbyId and hobbyId in resource table
                $sql = "SELECT hobbies.hobby as 'hobby',resources.link FROM hobbies INNER JOIN resources ON hobbies.hobbyId = resources.hobbyId";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $hobbies = $cmd->fetchAll();

                // For each hobby fetched from the select statement above, we
                // Parse the associated Hobby and resource to there respective table row
                foreach ($hobbies as $hobby) {
                    echo '<tr>
                        <td>' . $hobby['hobby'] . '</td>
                        <td><a href='.'"' . $hobby['link'] .'">'.$hobby['link'].'</a></td>
                        </tr>';
                }
                
                // disconnect
                ?>
            </tbody>
        </table>
            </div>
        <br>
            <h2>Randomly pick a project to work on (AND COMPLETE)</h2>
            <!--Button to activate below random project code-->
            <form method="post">
                <input type="submit" name="button1"
                class="btn btn-primary btn-lg active" value="Random">
            </form>   
            <?php

                //If button1 exists run the button1 function
                //This is done as an html button cannot run a php function alone
                //This allows the php code to see if a post has been submitted to it from the button1
                //Then it runs the function
                if(array_key_exists('button1', $_POST)) {
                    button1();
                }
                //Query for a random project name

                function button1(){
                    require 'db.php';
                    $sql = "SELECT project, projectId FROM projects ORDER BY RAND ( ) LIMIT 1";
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $randProject = $cmd->fetchAll();
                    // Set the project name to an h3 element
                    // Create table inside of the for each loop
                    // Run a second query inside of the for each loop
                    // quering for all resources with a projectId the same as the project queried earlier
                    foreach ($randProject as $project) {
                        echo '<h3>'.$project["project"]. '</h3>';
                        // echo "<br>";
                        $sql = "SELECT link FROM resources WHERE projectId = :projectId";
                        $cmd = $db->prepare($sql);
                        $cmd->bindParam(':projectId',$project['projectId'], PDO::PARAM_STR, 100);
                        $cmd->execute();
                        $randProjectLinks = $cmd->fetchAll();
                        echo '<div class>';
                        echo '<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Resources</th>
                            </tr>
                        </thead>
                        <tbody>';
                        // Use a second for each loop to parse resources
                        // the table by using the query above 
                        foreach ($randProjectLinks as $projectLink){
                            echo '<tr>
                            <td><a href='.'"' . $projectLink['link'] .'">'.$projectLink['link'].'</a><td>';
                            echo '</tr>';
                        }
                        echo 
                        '</tbody>
                        </table>';
                    }
                    
                }
            ?> 
            </main>
        </section>           
    </body>
</html>
