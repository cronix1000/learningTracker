<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Show what your learning</title>
        <!--Bootstrap-->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
    <body>
        <h1>What your learning</h1>
        <table class="table table-striped">
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
                $sql = "SELECT hobbies.hobby as 'hobby',resources.link FROM hobbies INNER JOIN resources ON hobbies.hobbyId = resources.hobbyId";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $hobbies = $cmd->fetchAll();

                // loop through results and display inside table cells
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
        
            <h2>Randomly pick a project to work on (AND COMPLETE)</h2>
            <?php
            
                if(array_key_exists('button1', $_POST)) {
                    button1();
                }
                function button1(){
                    require 'db.php';
                    $sql = "SELECT projects FROM projects ORDER BY RAND ( ) LIMIT 1";
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $randProject = $cmd->fetchAll();
                    foreach ($randProject as $project) {
                        echo $project['projects'];
                    }
                    $db = null;
                }
            ?>
            <form method="post">
                <input type="submit" name="button1"
                class="button" value="button1" />
            
    </body>
</html>
