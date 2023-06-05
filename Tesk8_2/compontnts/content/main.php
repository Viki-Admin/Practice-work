
    <?
    include 'controllers/db.php';
    ?>

                <div class="main_wrapper">
                    <div class="task_list">
                        <form class="avto" method="POST" action="controllers/out.php">
                            <input class="form_1" type='text' name="login" placeholder="Login:">
                            <input class="form_2" type="password" name="password" placeholder="Password:">
                            <input class="form_3" type="submit" name="sub_user" value=" Further ">
                        </form>
                    </div>
                </div>  
<?

        if ($_SESSION['error']) 
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    
        if ($_SESSION['mess']) 
        {
            echo $_SESSION['mess'];
            unset($_SESSION['mess']);
        }
        
?>
