<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = validate($_POST["first_name"]);
        $last_name = validate($_POST["last_name"]);
        $email = validate($_POST["email"]);
        $message = validate($_POST["message"]);
        $telephone = validate($_POST["telephone"]);
      }
      
      function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if(isset($first_name) && isset($last_name) && isset($email) && isset($message) && isset($telephone)) {
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'telephone' => $telephone,
            'message' => $message,
            'email' => $email
        ];
    
        $jsonString = json_encode($data, JSON_PRETTY_PRINT);
        $file_name = date("Y-m-d"). "_" . date("h-i-sA") . ".json";
        $path = "./data/". $file_name;
    
        // Saving data to a local json file
        $fp = fopen($path, 'w');
        fwrite($fp, $jsonString);
        fclose($fp);

        // Mail Functions
        // $customer_email = $email;
        
        // $subject = "Thank you for contacting us";  
        // $message = "Your message is received. We will get back to you soon.";  
        // $header = "From:info@ebeyonds.com \r\n";  
       
        // $result = mail ($customer_email ,$subject,$message,$header);  
       
        // if( $result == true ){  
        //    echo "Message sent successfully...";  
        // }else{  
        //    echo "Sorry, unable to send mail...";  
        //    $_SESSION['error'] = "Something went wrong. Please try again later.";
        //    header("Location: ../index.php");
        // }
        
        // $subject_admin = "New Contact Form Enquiry";
        // $message_admin = "Name: " . $first_name . " " . $last_name . "\nEmail: " . $email . "\nTelephone: " . $telephone . "\nMessage: " . $message;
        // $header_admin = "From:info@ebeyonds.com \r\n";

        // $admin_email_1 = "dumidu.kodithuwakku@ebeyonds.com";
        // $admin_email_2 = "prabhath.senadheera@ebeyonds.com";

        // $result_admin = mail ($admin_email_1,$subject_admin,$message_admin,$header_admin);

        // if( $result_admin == true ){  
        //     echo "Message sent successfully...";  
        //  }else{  
        //     echo "Sorry, unable to send mail...";  
        //  }

        //  $result_admin_2 = mail ($admin_email_2,$subject_admin,$message_admin,$header_admin);

        //  if( $result_admin == true ){  
        //     echo "Message sent successfully...";  
        //  }else{  
        //     echo "Sorry, unable to send mail...";  
        //  }
    }
    $_SESSION['alert'] = "Thank you for contacting us. We will get back to you soon.";
    header("Location: ../index.php");
?>