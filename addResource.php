<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>ToLearn</title>
        <!-- Bootstrap Link-->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
    <body>
        <h1>Add a hobby/Something to learn</h1> 
        <form method="POST" action="saveToResource.php">          
            <fieldset>
                <label for="resource" class="control-label"></label>
                <input name="link" id="link">
            </fieldset>
            <fieldset class="form-group m-1">
                <label for="hobbyId" class="control-label col-1">Hobby:</label>
                <select name="hobbyId" id="hobbyId">
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
                </fieldset>
                <fieldset class="form-group m-1">
                <label for="projectd" class="control-label col-1">Project:</label>
                <select name="projectId" id="projectId">
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
</html>