<html>
    <head dir="rtl">
        <title>My First Project</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/signin.css">
    </head>
    <body id="body">

        <div id="interface">
            <div id="tittle">
                <span id="tittletext">Login</span>
            </div>
            <div id="body">
                <form id="form" method="get" action="../php/authenticate.php">    
                    <td><input type="text" name="email" id="username"  placeholder="UserName " required ><br></td>
                    <td><input type="password" name="password" id="password" placeholder="Password" required><br></td>  
                    <td><input type="submit" name="sub" id="sub" class="submit" value="sign in"></td>
                    <div>


                    <?php
                        if(isset($_GET["msg"]))
                        {
                    ?>
                            <span id="msgbox" class="magbox" style="display: block" >
                                <img src="../images/email.png" >
                                <p><?php echo  $_GET["msg"]; ?></p>
                            </span>
                           
                    <?php
                        }
                        if(isset($_GET["error"]))
                        {
                    ?>
                        <p id="error" style="display: block"><?php echo  $_GET["error"]; ?> </p>
                    <?php
                        }
                    ?>
                    </div>
                  
                </form>
            </div>    
        </div>
    </body>
    <script src="../java/signin.js"></script>
</html>




