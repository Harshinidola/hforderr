<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /><br />
        <?php
       if(isset($_SESSION['add']))
       {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
       }

       ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>

                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username"></td>
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="text" name="password" placeholder="Your Password"></td>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
</div>
</div>

<?php include("partials/footer.php") ?>

<?php 
  //process the value from form and save
  //check if the button is clicked or not
  if(isset($_POST["submit"]))
  {
    //btn clicked

    //get the data from form
     $full_name=$_POST['full_name'];
     $username=$_POST['username'];
     $password=md5($_POST['password']);

     //SQL query to save data
     $sql="INSERT INTO tbl_admin SET
     full_name='$full_name',
     username='$username',
     password='$password'
     ";
    
    //Executing query and saving data
     $res= mysqli_query($conn,$sql) or die(mysqli_error());

     //4.check if the data is inserted
     if($res==true){
        $_SESSION['add']="Admin added successfully";
        header("location:".SITEURL."admin/manage-admin.php");
     }
     else{
        $_SESSION['add']="Admin added failed";
        header("location:".SITEURL."admin/add-admin.php");
     }
  }
  
?>