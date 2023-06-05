<?
    include 'controllers/db.php';


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
            <div class="main_wrapper">
                <div class="task">
                <div class="list">
               
               
               
               <? 
                    $user_id=$_SESSION['users']['id'];
                    $del_id = $_GET['del_id'];

		            $str_del_tasks = "DELETE FROM `tasks` WHERE `user_id` = $user_id";

		            if ($del_id) {
			            $run_del_tasks = mysqli_query($connect, $str_del_tasks);
			            if ($run_del_tasks) {
				            echo " <font color=green>Задание удалено!</font>";
			            } else {
				            echo " <font color=red>Задание удалить не удалось!</font>";
			            }
		            }

                    $READY_ALL=$_GET['READY_ALL'];

                    $str_ud_list= "UPDATE `tasks` SET `status` = 2 WHERE user_id = $user_id";
                    if($READY_ALL)
                    {
                        $up_list=mysqli_query($connect, $str_ud_list);
                    }



                ?>

                <form method="POST"action="controllers/add.php">
                    <p>Tesk list</p>
                    <hr>

                    <input class="form_4" type="text" name="description" placeholder="Enter text...">
                    <input class="form_5" type="submit" name="sub_list" value=" ADD TASC "><br>
                </form>
                    <a href='?del_id=$out_list[id]'><input class='form_6' type='submit' name='sub_user' value=' REMOVE ALL '></a>

                    <a href='?READY_ALL=$out_list[id]'><input class="form_6" type="submit" name="sub_list" value=" READY ALL "><br></a>
                    <hr>
                
                    


                    <?


                    $delete_id = $_GET['delete_id'];
		            $str_delete_tasks = "DELETE FROM `tasks` WHERE `id` = $delete_id";

		            if ($delete_id) {
			            $run_delete_tasks = mysqli_query($connect, $str_delete_tasks);
			            if ($run_delete_tasks) {
				            echo " <font color=green>Задание удалено!</font>";
			            } else {
				            echo " <font color=red>Задание удалить не удалось!</font>";
			            }
		            }

                    $user_id=$_SESSION['users']['id'];
                    // $user_id=settype($user_id,'integer');

                    $str_tesk_list="SELECT * FROM `tasks` WHERE user_id = $user_id ";
                    $run_tesk_list=mysqli_query($connect,$str_tesk_list);
                    $tesk_list_str=mysqli_num_rows($run_tesk_list);

                    while ($out_list = mysqli_fetch_array($run_tesk_list)) {
                        if($out_list['status'] == 1)
                        {
                            $status_btn="<a href='../controllers/status.php?status_id=$out_list[id]'><input class='form_6' type='submit' name='sub_user' value=' UNREADY  '></a>";
                            $status_img="<div class= 'd1'></div>";
                        }
                        elseif($out_list['status'] == 2)
                        {
                            $status_btn="<a href='../controllers/status.php?status_id=$out_list[id]'><input class='form_6' type='submit' name='sub_user' value=' READY  '></a>";
                            $status_img="<div class= 'd2'></div>";
                        }
                        echo"

                                <p class = 'text'>$out_list[description]<br></p>
                                <div class= 'dis'>
                                    <div class = 'di'>
                                        <a href='?delete_id=$out_list[id]'><input class='form_6' type='submit' name='sub_user' value=' DELETE '></a>
                                        $status_btn
                                        
                                    </div>
                                    $status_img
                                </div>
                                <hr>"
                                ;}
                        
                    
                    ?>
                    

                </div>
            </div> 
            </div>
