<?php 
// Include database connection
include_once("db_conn.php");

// User Registration function
function userRegistration($userName, $userEmail, $userPass, $userPhone, $userNic) {
    // Create database connection
    $db_conn = Connection();
    
    // Data insert query
    $insertSql = "INSERT INTO user_tbl(user_name, user_email, user_phone, user_nic, user_status)
                  VALUES('$userName', '$userEmail', '$userPhone', '$userNic', 1);";

    $sqlResult = mysqli_query($db_conn, $insertSql);

    // Check for database connection errors
    if (!$sqlResult) {
        echo "Database insert error: " . mysqli_error($db_conn);
        return "Please Try Again!!";
    }

    // If the registration is successful, insert data into the login table
    if ($sqlResult) {
        // Use MD5 method for password
        $newPassword = md5($userPass);

        $insertLogin = "INSERT INTO login_tbl(login_email, login_pwd, login_role, login_status)
                        VALUES('$userEmail', '$newPassword', 'user', 1);";

        $loginResult = mysqli_query($db_conn, $insertLogin);

        // Check for database connection errors in login insert
        if (!$loginResult) {
            echo "Database insert error: " . mysqli_error($db_conn);
            return "Please Try Again!!";
        }

        return "Your Registration is Successful!!!";
    } else {
        return "Please Try Again!!";
    }    
}

// Login function
function Authentication($userName, $userPass) {
    // Call database connection
    $db_conn = Connection();

    $sqlFetchUser = "SELECT * FROM login_tbl WHERE login_email = '$userName';";
    
    // Correct the assignment of $sqlResult
    $sqlResult = mysqli_query($db_conn, $sqlFetchUser);

    // Check for database connection errors
    if (!$sqlResult) {
        echo "Error in SQL query: " . mysqli_error($db_conn); 
        return "An error occurred!";
    }

    // Convert the user password into a hash value
    $newpass = md5($userPass);

    // Check if any record was found
    $norows = mysqli_num_rows($sqlResult);

    if ($norows > 0) {
        // Fetch the user record
        $rec = mysqli_fetch_assoc($sqlResult);

        // Validate the password
        if ($rec['login_pwd'] == $newpass) {
            // Validate the user login status
            if ($rec['login_status'] == 1) {
                if ($rec['login_role'] == "admin") {
                    // Redirect to admin dashboard
                    header('Location: lib/views/dashboards/admin.php');
                } else {
                    // Redirect to user dashboard
                    header('Location: lib/views/dashboards/user.php');
                }
                exit();
            } else {
                return "Your Account Has Been Deactivated!";
            }
        } else {
            return "Your Password Is Incorrect! Please Try Again!";
        }
    } else {
        return "No Records Found!";
    }

    // Close the connection
    mysqli_close($db_conn);
}
?>
