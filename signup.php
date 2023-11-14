<?php
    include('connection_up.php');
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['user']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

        
        
        $sql = "Select * from user where SRN='$username'";
        $result = mysqli_query($conn, $sql);        
        $count_user = mysqli_num_rows($result);  

        
        if($count_user == 0){  
            
            if($password == $cpassword) {
    
                //$hash = password_hash($password, 
                  //                  PASSWORD_DEFAULT);
                    
                // Password Hashing is used here. 
                $sql = "INSERT INTO user(SRN, password) VALUES('$username','$password')";
        
                $result = mysqli_query($conn, $sql);
        
                if ($result) {
                    header("Location: welcome_up.php");
                }
            } 
            else { 
                echo  '<script>
                        alert("Passwords do not match")
                        window.location.href = "index_up.php";
                    </script>';
            }      
        }  
        else{  
            if($count_user>0){
                echo  '<script>
                        window.location.href = "index_up.php";
                        alert("Username already exists!!")
                    </script>';
            }
            if($count_email>0){ 
                echo  '<script>
                        window.location.href = "index_up.php";
                        alert("Email already exists!!")
                    </script>';
            }
        }     
    }
    ?>