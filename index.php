<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>All University BD</title>
        <meta charset="UTF-8">
        <meta name="'viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/questions.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/online_exam.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_menu.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/login.css"/>
    </head>
    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <?php
        include './menu.php';
        ?>
        <div class="clear"></div>
        <div class="slider_area">
            <div class="slider">
                <iframe src="cssslider.html" style="width:100%;height:100%;max-width:100%;border:none;padding:0;margin:0 auto;display:block; overflow: hidden;" marginheight="0" marginwidth="0"></iframe>
            </div>

        </div>
        <div class="clear"></div>
        <div class="featured_area">
            <div class="all_university_bd" >
                <?php
                include './university_list.php';
                ?>
            </div>
            <div class="notice_board"> 
                <marquee height="100%" behavior="scroll"  direction="up"  onmouseover="this.stop();" onmouseout="this.start();" > 


                    <?php
                    include_once './Class/Database_class.php';
                    $database_object = new Database_class(); //passing Prev_question database

                    $result = $database_object->select_all_Question_info(news); //passing table name

                    while ($row = mysql_fetch_assoc($result)) {
                        ?>
                        <ul>
                            <li class="marquee_class" ><?php echo $row[news] ?></li>
                        </ul>


                        <?php
                    }
                    ?>
                </marquee>
            </div>
            <div class="note">
                <div class="fb-page" data-href="https://www.facebook.com/pages/INCOMPLETE-FIREBRIDGE/210961672257330?ref=br_rs" data-width="100" data-height="300" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/INCOMPLETE-FIREBRIDGE/210961672257330?ref=br_rs"><a href="https://www.facebook.com/pages/INCOMPLETE-FIREBRIDGE/210961672257330?ref=br_rs">INCOMPLETE FIREBRIDGE</a></blockquote></div></div>     
<?php
if (isset($_POST['logout'])) {
    unset($_SESSION['login']);
}

  if ($_SESSION['login'] == TRUE) {
    echo 'Logid in.............';
 
    ?>
                <form action="index.php" method="post">
                            <input class="log_out_btn" type="submit" value="Logout" name="logout"> 
                        </form> 
                        <?php
                    }
              
 else  {
    ?>
                    <div id="login">
                        <h1 class="login_text">Please login.</h1>
                        <form action="index.php" method="post">
                            <fieldset>
                                <p><input type="text" required value="Email" name ="email" onBlur="if (this.value == '')
                                            this.value = 'Username'" onFocus="if (this.value == 'Username')
                                                        this.value = ''"></p>
                                <p><input type="password" required value="Password" name ="password" onBlur="if (this.value == '')
                                            this.value = 'Password'" onFocus="if (this.value == 'Password')
                                                        this.value = ''"></p>
                                <p><a href="#">Forgot Password?</a></p>

                                <input class="login_btn" type="submit" value="Login" name="submit"> 

                            </fieldset>
                        </form>
    <?php
    if (isset($_POST['submit'])) {
    $re = $database_object->confirm_login($_POST['email'], $_POST['password']);
    echo 'ovi';
          if($re==TRUE){
           $_SESSION['login'] = TRUE;
          }
}
            } 

    ?>
                </div>
            </div>

                    <?php
                    include './footer_add.php';
                    ?>
    </body>
</html>