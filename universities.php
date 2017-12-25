<!DOCTYPE html>

<meta charset="UTF-8">
<html>
    <head>
        <title>Universities</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link rel="stylesheet" href="CSS/universities_style.css" type="text/css"/>
         <link rel="stylesheet" href="CSS/style.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/style_menu.css" type="text/css"/>
        
     
    </head>
    <body>
        <?php
        include './menu.php';
        ?>

        <div class="content_area">
            <div class="left_menu">
                <?php
                include './university_list.php';

                include_once './Class/Database_class.php';
                $database_object = new Database_class(); //passing Prev_question database
                 $id = $_GET['id'];
                 if ($id == 0) {
                    $id =1;
                }
                 $result = $database_object->select_university_info($id); //passing table name
                 $row = mysql_fetch_assoc($result);
                 ?>
            </div>
                  <div class="content">
                <div class="uni_logo"><img src="data:upload/jpeg;base64,<?php echo base64_encode( $row['logo'] ); ?>" height="100px" width="100px" /></div>
                <h1><?php echo $row[u_name] ?> </h1>
                <h3><?php echo $row[location] ?></h3>
                  <p>
                    <?php echo "$row[script]" ?>
                   </p>
                   </div>
                </div>
            <?php
        include './footer_add.php';
        ?>
    </body>
</html>