<?php
$table = $_GET['id'];
if (!isset($_COOKIE["online_exam"])) {
    if ($table == NULL) {
        $table = 'physics_1';
    }
}
if ($table == NULL) {
    $table = $_COOKIE["online_exam"];
} else {
    setcookie("online_exam", $table);
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>online Exam</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/online_exam.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_menu.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/universities_style.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/questions.css"/>
    </head>
    <body>
        <?php
        include './menu.php';
        ?>
        <div class="content_area">
            <div class="left_menu">
                <div class="nav">
                    <ul>

                        <li>
                            <a href="">Physics</a>
                            <ul>
                                <li>
                                    <a  href ='online_exam.php?id=physics_1' >University</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=physics_2' >Medical</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=physics_3' >National</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="">English</a>
                            <ul>
                                <li>
                                    <a href ='online_exam.php?id=english_1' >University</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=english_2' >Medical</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=english_3' >National</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="">Bangla</a>
                            <ul>
                                <li>
                                    <a href ='online_exam.php?id=bangla_1' >University</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=bangla_2'>Medical</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=bangla_3'>National</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="">Biology</a>
                            <ul>
                                <li>
                                    <a href ='online_exam.php?id=biology_1'>University</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=biology_2'>Medical</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=biology_3'>National</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="">Math</a>
                            <ul>
                                <li>
                                    <a href ='online_exam.php?id=math_1'>University</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=math_2'>Medical</a>
                                </li>
                                <li> 
                                    <a href ='online_exam.php?id=math_3'>National</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="">Chemistry</a>
                            <ul>
                                <li>
                                    <a href ='online_exam.php?id=chemistry_1'>University</a>
                                </li>
                                <li> 
                                    <a  href ='online_exam.php?id=chemistry_2'>Medical</a>
                                </li>
                                <li> 
                                    <a  href ='online_exam.php?id=chemistry_3'>National</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="question_content">
                    <?php
                    require_once './Class/Database_class.php';
                    $database_object = new Database_class(); //passing Prev_question database
                    ?>
                    <h1>Model Test of <?php echo $table; ?> <br><br> Time: 1 hour</h1>
                    <br>

                    <form  method="get">
                        <?php
                        $result = $database_object->select_all_Question_info($table); //passing table name
                        $q = 1;
                        $ans = array();
                        while ($row = mysql_fetch_assoc($result)) {
                            if ($table == "")
                                break;
                            $ans[$q] = $row[ans];
                            ?> 
                            <div class="exam_question">
                                <div class="Exam_question_text">  <?php echo $q . '.' . $row[question]; ?></div>
                                <div class="clear"></div>
                                <div class="Exam_answer"> <input type="radio" name="<?php echo $row[id]; ?>" value="a" /><?php echo 'A. '. $row[A]; ?></div>
                                <div class="Exam_answer"><input type="radio" name="<?php echo $row[id]; ?>" value="b" /><?php echo 'B. '. $row[B]; ?></div>
                                <div class="Exam_answer"> <input type="radio" name="<?php echo $row[id]; ?>" value="c" /><?php echo'C. '.  $row[C]; ?></div>
                                <div class="Exam_answer"><input type="radio" name="<?php echo $row[id]; ?>" value="d" /><?php echo 'D. '. $row[D]; ?></div>
                            </div>
                            <?php
                            $q++;
                        }
                        ?>
                        <input type="submit" value="submit" name="submit"  style="margin-left: 350px; margin-top:20px; height: 50px; width: 80px;">
                    </form>  

                    <?php
                    if (isset($_GET['submit'])) {
                        $last_result = 0;
                        for ($i = 1; $i < $q; $i++) {
                            if ($ans["$i"] == $_GET["$i"]) {
                                $last_result++;
                            }
                        }
                        $show = 'প্রাপ্ত নম্বর :' . $last_result;
                        echo '<script type="text/javascript">alert("' . $show . '")</script>';
                    }
                    ?> 
                </div>
            </div>
        </div>

        <?php
        include './footer_add.php';
        ?>
    </body>
</html>
