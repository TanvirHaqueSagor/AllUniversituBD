<!DOCTYPE html>
<html>
    <head>
        <title>Advice for Examine</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_menu.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/universities_style.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/questions.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/online_exam.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/books.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/advice_for_examine.css"/>
    </head>
    <body>
        <?php include './menu.php'; ?>
        <?php
        include_once './Class/Database_class.php';
        $database_object = new Database_class();
        $result = $database_object->select_advicer();
        ?>
        <div class="content_area">
            <div class="advice_marque">
                <form action="" method="get">
                    <marquee height="100%" behavior="scroll"  direction="left"  onmouseover="this.stop();" onmouseout="this.start();" >
                        <?php
                        $i = 1;
                        while ($colum = mysql_fetch_assoc($result)) {
                            ?>
                            <a href ='advice_for_Examine.php?id=<?php echo $i; ?>'><img src="data:upload/jpeg;base64,<?php echo base64_encode($colum['pic']); ?>" height="100px" width="100px" /></a>  
                            <?php $i++;
                        } ?>
                    </marquee>
                </form>
            </div>
            <?php
            $id = $_GET['id'];
            if ($id == NULL)
                $id = 1;
            $sdvice_result = $database_object->select_all_advice($id);
            $row = mysql_fetch_assoc($sdvice_result);
            ?>

            <div class="name_logo_wraper">
                <div class="teachet_pic"><a><img src="data:upload/jpeg;base64,<?php echo base64_encode($row['pic']); ?>" height="100px" width="100px"/></a></div>
                <div class="name_detels">
                    <pre class="sir_name"><?php echo $row['name']; ?> </br><?php echo $row['designation']; ?></pre>
                    <hr>
                </div>
            </div>
            <div class="speach">
                <span>
                    <p>
<?php echo $row['speach']; ?> 
                    </p>
                </span>
            </div>
        </div>
        <?php
        include './footer_add.php';
        ?>
    </body>
</html>
