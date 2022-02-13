<?php
            require 'db.php';
            $sql = "SELECT projects FROM projects ORDER BY RAND ( ) LIMIT 1";
                
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $randProject = $cmd->fetchAll();

            foreach ($randProject as $project) {
                echo $project['projects'];
            }
            $db = null;
            ?>