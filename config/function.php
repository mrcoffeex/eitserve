<?php

    function verifyPassword($entered, $stored){

        if (md5($entered) === $stored) {
            return true;
        } else {
            return false;
        }

    }

	function clean_string($value){

        include 'conf.php';
		
		if (empty($value)) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_SANITIZE_STRING)) {
                header($input_error."?note=not_real_string");
            } else {
                return $value;
            }
        }
        
	} 

    function clean_email($value){

        include 'conf.php';

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            header($input_error."?note=not_real_email");
        } else {
            return $value;
        }

    }

    function clean_int($value){

        if ($value == 0) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_VALIDATE_INT)) {
                header($input_error."?note=not_real_int");
            } else {
                return $value;
            }
        }        
    }

    function clean_float($value){

        if ($value == 0) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
                header($input_error."?note=not_real_float");
            } else {
                return $value;
            }
        }        
    }

    function checkfileCSV($file){

        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if ($ext == "csv") {
            $r_value = 1;
        }else{
            $r_value = 0;
        }

        return $r_value;
    }

	function getAge($birthday){
        //values
        $date_now = strtotime(date("Y-m-d"));
        $value = strtotime($birthday);

        //subtract in seconds
        $date_diff = $date_now - $value;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        $months = $days / 30;

        $weeks = $days / 7;

        if ($days <= 6) {
            $finalset = $days;
            $age_ext = " days";
        } else if ($days <= 28) {
            $finalset = $weeks;
            $age_ext = " weeks";
        } else if ($days <= 364) {
            $finalset = $months;
            $age_ext = " months";
        } else {
            $finalset = $years;
            $age_ext = " yrs";
        }

        //result
        $result = floor($finalset)." ".$age_ext;

        return $result;
    }

	function getYears($birthday){
        //values
        $date_now = strtotime(date("Y-m-d"));
        $value = strtotime($birthday);

        //subtract in seconds
        $date_diff = $date_now - $value;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        if ($days < 365) {
            $finalset = 1;
        } else {
            $finalset = $years;
        }

        //result
        $result = floor($finalset);

        return $result;
    }

	function getMonths($birthday){
        //values
        $date_now = strtotime(date("Y-m-d"));
        $value = strtotime($birthday);

        //subtract in seconds
        $date_diff = $date_now - $value;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        $months = $days / 30;

        if ($days < 30) {
            $finalset = 1;
        } else {
            $finalset = $months;
        }

        //result
        $result = floor($finalset);

        return $result;
    }

    function get_year_two_param($before, $later){
        //values
        $value_one = strtotime($later);
        $value_two = strtotime($before);

        //subtract in seconds
        $date_diff = $value_one-$value_two;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        //result
        $result = floor($years);

        return $result;
    }

    function getTimePassed($basetime, $currenttime){

        $secs = strtotime($currenttime) - strtotime($basetime);

        $mins = $secs / 60;
        $hours = $secs / 3600;
        $days = $secs / 86400;

        if ($secs < 60) {
            $res = "Just Now";
        } else if ($secs >= 60 && $secs < 3600) {
            $res = floor($mins) . " minute(s) ago";
        } else if ($secs >= 3600 && $secs < 86400) {
            $res = floor($hours) . " hour(s) ago";
        } else {
            if ($days < 7) {
                $res = floor($days) . " day(s) ago";
            } else if ($days >= 7 && $days < 30.5) {
                $res = floor($days / 7)." week(s) ago";
            } else if ($days >= 30.5 && $days < 365.25) {
                $res = floor(($days / 30.5))." month(s) ago";
            } else {
                $res = floor(($days / 365.25))." year(s) ago";
            }
        }
        
        return $res;
    }

    function getTimeDiff($basetime, $currenttime){

        $secs = strtotime($currenttime) - strtotime($basetime);

        $mins = $secs / 60;
        $hours = $secs / 3600;
        $days = $secs / 86400;

        if ($secs < 60) {
            $res = "Just Now";
        } else if ($secs >= 60 && $secs < 3600) {
            $res = floor($mins) . " minute(s)";
        } else if ($secs >= 3600 && $secs < 86400) {
            $res = floor($hours) . " hour(s)";
        } else {
            if ($days < 7) {
                $res = floor($days) . " day(s)";
            } else if ($days >= 7 && $days < 30.5) {
                $res = floor($days / 7)." week(s)";
            } else if ($days >= 30.5 && $days < 365.25) {
                $res = floor(($days / 30.5))." month(s)";
            } else {
                $res = floor(($days / 365.25))." year(s)";
            }
        }
        
        return $res;
    }

    function previewImage($image, $default, $directory){

        if (empty($image)) {
            $res = $default;
        }else{
            $res = $directory . "" . $image;
        }

        return $res;

    }

    function displayImage($image, $directory, $default){

        if (empty($image)) {
            $res = "../../images/" . $default;
        }else{

            //url validation
            if (filter_var($image, FILTER_VALIDATE_URL)) {
                $res = $image;
            } else {
                $res = $directory . "" . $image;
            }

        }

        return $res;

    }

    function setActive($value){

        $currpage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));

        if ($currpage == $value) {
            $res = "active";
        } else {
            $res = "";
        }
        
        return $res;
    }

    function createLog($note_text, $user, $type){

    	$my_notification_full = $note_text." - ".$user;
    	
    	//INSERT to database
    	$statement=dataConnect()->prepare("INSERT Into notifications(
                                notif_type,
                                notif_text,
                                notif_created) 
                                Values(
                                    :mytype,
                                    :mynotification,
                                    NOW() )");
        $statement->execute([
            'mytype' => $type,
            'mynotification' => $my_notification_full
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function get_days($fromdate, $todate) {
        $fromdate = \DateTime::createFromFormat('Y-m-d', $fromdate);
        $todate = \DateTime::createFromFormat('Y-m-d', $todate);
        return new \DatePeriod(
            $fromdate,
            new \DateInterval('P1D'),
            $todate->modify('+1 day')
        );
    }

    function dataVerify($value, $alt){
        if (empty($value)) {
            $res = $alt;
        }else{
            $res = $value;
        }

        return $res;
    }

    function my_randoms( $length ) {
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

    function my_rand_str( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

    function my_rand_int( $length ) {
        $chars = "0123456789";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }
    
    function RealNumber($value, $decimal){

        if ($value == 0) {
            $res = number_format(0, $decimal);
        } else {
            if ($decimal == "") {
                $res = number_format($value);
            } else {
                $res = number_format($value, $decimal);
            }
        }
        
        return $res;
    }

    function toAlpha($number){
        
        $alphabet = array('N', 'S', 'T', 'A', 'R', 'G', 'O', 'L', 'D', 'E');

        $count = count($alphabet);
        if ($number == 10){
            $alpha = "SN";
        } else if ($number <= $count) {
            return $alphabet[$number - 0];
        }
        $alpha = '';
        while ($number > 0) {
            $modulo = ($number - 0) % $count;
            $alpha  = $alphabet[$modulo] . $alpha;
            $number = floor((($number - $modulo) / $count));
        }
        return $alpha;
    }

    function stringLimit($name, $limit){

        if (strlen($name) > $limit){
            $name = substr($name, 0, $limit) . '...';
        }else{
            $name = $name;
        }

        return $name;
    }

    function addS($string, $value){

        if ($value > 1) {
            $res = $string . "s";
        } else {
            $res = $string;
        }
        
        return $res;
    }

    function compare_update($old_data , $new_data , $type_data){
        if ($old_data != $new_data) {
            $my_data_res = $type_data.": ".$old_data." -> ".$new_data." , ";
        }else{
            $my_data_res = "";
        }

        return $my_data_res;
    }

    function proper_date($datetime){

        if ($datetime == "") {
            $res = "";
        }else{
            $res = date("Md Y", strtotime($datetime));
        }

        return $res;

    }

    function proper_time($datetime){

        if ($datetime == "") {
            $res = "";
        }else{
            $res = date("g:i A", strtotime($datetime));
        }

        return $res;

    }

    function get_date_status($date){

        $thisdate = date("Y-m-d");
        $thistomorrow = date("Y-m-d", strtotime("+1 day"));
        $thisyesterday = date("Y-m-d", strtotime("-1 day"));

        if (date("Y") == date("Y", strtotime($date))) {
            if ($date == $thisdate) {
                $res = "Today";
            }else if ($date == $thistomorrow) {
                $res = "Tomorrow";
            }else if ($date == $thisyesterday) {
                $res = "Yesterday";
            }else{
                $res = date("Md", strtotime($date));
            }
        }else{
            $res = date("Md Y", strtotime($date));
        }

        return $res;

    }
    
    function validateChecked($value, $checkboxValue){

        if ($checkboxValue == $value) {
            $res = "checked";
        } else {
            $res = "";
        }
        
        return $res;
    }

    function removeCharThatStarts($string, $char){

        $res = substr($string, 0, strpos($string, $char));

        if (empty($res)) {
            return $string;
        } else {
            return $res;
        }

    }
    
    function getFileExtension($path){

        $res = pathinfo($path, PATHINFO_EXTENSION);

        return $res;

    }

    function imageUpload($input, $location){

        $errors= array();
        $file_name = $_FILES[$input]['name'];

        if (empty($file_name)) {
            $res = "";
        } else {
            $file_size =$_FILES[$input]['size'];
            $file_tmp =$_FILES[$input]['tmp_name'];
            $file_type=$_FILES[$input]['type'];
            $file_extension = pathinfo($_FILES[$input]['name'], PATHINFO_EXTENSION);

            $final_filename = date("YmdHis")."_".$file_name;

            $extensions= array("jpeg","jpg","png","jfif");

            if(in_array($file_extension, $extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 26000000){
                $errors[]='File size must be excately 25 MB';
            }

            $file_directory = $location."".$final_filename;

            if(empty($errors)==true){

                move_uploaded_file($file_tmp, $file_directory);
                $res = $final_filename;

            }else{

                if ($file_tmp == "") {
                    $res = "";
                }else{
                    $res = "error";
                }

            }
        }

        return $res;

    }

    function fileUpload($input, $location){

        $errors= array();
        $file_name = $_FILES[$input]['name'];

        if (empty($file_name)) {
            $res = "";
        } else {
            $file_size =$_FILES[$input]['size'];
            $file_tmp =$_FILES[$input]['tmp_name'];
            $file_type=$_FILES[$input]['type'];
            $file_extension = pathinfo($_FILES[$input]['name'], PATHINFO_EXTENSION);

            $final_filename = date("YmdHis")."_".$file_name;

            $extensions= array("pdf","doc","docx");

            if(in_array($file_extension, $extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 26000000){
                $errors[]='File size must be excately 25 MB';
            }

            $file_directory = $location."".$final_filename;

            if(empty($errors)==true){

                move_uploaded_file($file_tmp, $file_directory);
                $res = $final_filename;

            }else{

                if ($file_tmp == "") {
                    $res = "";
                }else{
                    $res = "error";
                }

            }
        }

        return $res;

    }

    // methods_system_logs

    function get_system_logs_skin($type){

        if ($type == "auth") {
            $res = "text-primary";
        }else if ($type == "insert") {
            $res = "text-success";
        }else if ($type == "delete") {
            $res = "text-warning";
        }else if ($type == "update") {
            $res = "text-info";
        }else if ($type == "attempt") {
            $res = "text-danger";
        }else{
            $res = "text-muted";
        }

        return $res;

    }

    function count_system_logs($date1, $date2){

        $statement=dataConnect()->prepare("SELECT notif_id From notifications Where date(notif_created) BETWEEN :date1 AND :date2 ");
        $statement->execute([
            'date1' => $date1,
            'date2' => $date2
        ]);
        $countres=$statement->rowCount();

        return $countres;
    }

    function selectLogsToday(){

        $statement=dataConnect()->prepare("SELECT notif_type,
                                        notif_created, 
                                        notif_text 
                                        From 
                                        notifications
                                        Order By 
                                        notif_id DESC LIMIT 50");
        $statement->execute();

        return $statement;

    }

    // users

    function selectUsers(){

        $statement=dataConnect()->prepare("SELECT 
                                        * 
                                        From 
                                        users
                                        Where
                                        user_uid != :user_uid
                                        Order By 
                                        user_fullname 
                                        ASC");
        $statement->execute([
            'user_uid' => 1
        ]);

        return $statement;
    }

    function countUsers(){

        $statement=dataConnect()->prepare("SELECT user_uid From users 
                                        Where
                                        user_uid != :user_uid");
        $statement->execute([
            'user_uid' => 1
        ]);
        $count=$statement->rowCount();

        return $count;
    }

    function removeUser($userId){

        $statement=dataConnect()->prepare("DELETE FROM
                                        users
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;
        }else{
            return false;
        }
    }

    function user_type($usertype){
        if ($usertype == 0) {
            $res = "Admin";
        }else if ($usertype == 1) {
            $res = "School";
        }else if ($usertype == 2) {
            $res = "Business";
        }else if ($usertype == 3) {
            $res = "Student";
        }else{
            $res = "unknown";
        }
        return $res;
    }

    function createUserReg($userCode, $fname, $lname, $uEmail, $uPassword, $userType){

        $statement=dataConnect()->prepare("INSERT INTO 
                                        users
                                        (
                                            user_code,
                                            user_fname,
                                            user_lname,
                                            user_email,
                                            user_password,
                                            user_type,
                                            user_created,
                                            user_updated
                                        )
                                        Values
                                        (
                                            :user_code,
                                            :user_fname,
                                            :user_lname,
                                            :user_email,
                                            :user_password,
                                            :user_type,
                                            NOW(),
                                            NOW()
                                        )");
        $statement->execute([
            'user_code' => $userCode,
            'user_fname' => $fname,
            'user_lname' => $lname,
            'user_email' => $uEmail,
            'user_password' => $uPassword,
            'user_type' => $userType
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function updateUserAccount($userEmail, $userPassword, $userId){

        $statement=dataConnect()->prepare("UPDATE
                                        users
                                        SET
                                        user_email = :user_email,
                                        user_password = :user_password,
                                        user_updated = NOW()
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_email' => $userEmail,
            'user_password' => $userPassword,
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
    
    }

    function updateUserAccountImg($userEmail, $userPassword, $profileImg, $userId){

        $statement=dataConnect()->prepare("UPDATE
                                        users
                                        SET
                                        user_email = :user_email,
                                        user_password = :user_password,
                                        user_profile_img = :user_profile_img,
                                        user_updated = NOW()
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_email' => $userEmail,
            'user_password' => $userPassword,
            'user_profile_img' => $profileImg,
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
    
    }

    function updateUserFirstname($fname, $userCode){

        $statement=dataConnect()->prepare("UPDATE
                                        users
                                        SET
                                        user_fname = :user_fname
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_fname' => $fname,
            'user_code' => $userCode
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
    
    }

    function getUserFullname($userId){

        $statement=dataConnect()->prepare("SELECT 
                                        user_fname,
                                        user_lname 
                                        FROM
                                        users
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_uid' => $userId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_fname'] . " " . $res['user_lname'];
        } else {
            return null;
        }

    }

    function getUserFullnameByCode($userCode){

        $statement=dataConnect()->prepare("SELECT 
                                        user_fname,
                                        user_lname 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_fname'] . " " . $res['user_lname'];
        } else {
            return null;
        }

    }

    function getUserEmail($userCode){

        $statement=dataConnect()->prepare("SELECT 
                                        user_email 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_email'];
        } else {
            return null;
        }

    }

    function getUserType($userCode){

        $statement=dataConnect()->prepare("SELECT 
                                        user_type 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_type'];
        } else {
            return null;
        }

    }

    function checkUserEmail($email){

        $statement=dataConnect()->prepare("SELECT 
                                        user_uid 
                                        FROM
                                        users
                                        Where
                                        user_email = :user_email");
        $statement->execute([
            'user_email' => $email
        ]);

        $count=$statement->rowCount();

        if (empty($count)) {
            return true;
        } else {
            return false;
        }

    }

    function getUserImg($userCode){

        $statement=dataConnect()->prepare("SELECT 
                                        user_profile_img 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_profile_img'];
        } else {
            return null;
        }

    }

    function verifyUserCode($userCode){

        $statement=dataConnect()->prepare("SELECT 
                                        user_uid 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $count=$statement->rowCount();

        if (!empty($count)) {
            return true;
        } else {
            return false;
        }

    }

    function checkUserVerification($userCode){

        $statement=dataConnect()->prepare("SELECT
                                        user_verified
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if ($res['user_verified'] == 1) {
            return true;
        } else {
            return false;
        }

    }

    // smtp email

    function sendEmail($emailTo, $emailSubject, $emailMessage, $autoload){

        require $autoload;
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@e4psmap.com";
        $mail->Password = "Semicircle_123";
        $mail->IsHTML(true);
        
        $mail->setFrom('noreply@e4psmap.com', 'InternBuilders');
        $mail->addAddress($emailTo, '');
        $mail->Subject = $emailSubject;
        
        $mail->Body = $emailMessage;
        
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }

    }

    // otp

    function createOTP($userCode){

        $randomNumber = my_rand_int(6);

        $statement=dataConnect()->prepare("INSERT INTO 
                                        otps
                                        (
                                            otp_num, 
                                            user_code, 
                                            otp_status,
                                            otp_created
                                        ) 
                                        VALUES
                                        (
                                            :otp_num, 
                                            :user_code, 
                                            :otp_status,
                                            NOW()
                                        )");
        $statement->execute([
            'otp_num' => $randomNumber, 
            'user_code' => $userCode,
            'otp_status' => 0,
        ]);

        return $randomNumber;

    }

    function sendOTP($userCode, $emailTo, $autoload){

        $otp = createOTP($userCode);

        $subject = "Verification Code: " . $otp;
        $message = "<p>Here is you verification code:</p>";
        $message .= "<h4>" . $otp . "</h4>\n\n";
        $message .= "<p>If this request did not come from you, change your account password immediately to prevent further unauthorized access.</p>";
        $message .= "<p>This is a system generated email. Do not reply.</p>";

        $request = sendEmail($emailTo, $subject, $message, $autoload);

        if ($request == true) {
            return true;
        } else {
            return false;
        }

    }

    function updateOTPStatus($userCode, $otp){

        $statement=dataConnect()->prepare("UPDATE 
                                        otps
                                        SET
                                        otp_status = :otp_status
                                        Where
                                        user_code = :user_code
                                        AND
                                        otp_num = :otp_num");
        $statement->execute([
            'otp_status' => 1,
            'user_code' => $userCode,
            'otp_num' => $otp
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }
    
    function verifyUser($userCode){

        $statement=dataConnect()->prepare("UPDATE 
                                        users
                                        SET
                                        user_verified = :user_verified
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_verified' => 1,
            'user_code' => $userCode
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function verifyOTP($userCode, $otp){

        $statement=dataConnect()->prepare("SELECT 
                                        otp_id
                                        FROM
                                        otps
                                        Where
                                        user_code = :user_code
                                        AND
                                        otp_num = :otp_num
                                        AND
                                        otp_status = :otp_status");
        $statement->execute([
            'user_code' => $userCode,
            'otp_num' => $otp,
            'otp_status' => 0
        ]);

        $count=$statement->rowCount();

        if (!empty($count)) {

            updateOTPStatus($userCode, $otp);
            verifyUser($userCode);

            return true;
        } else {
            return false;
        }
        
    }

    // products

    function selectProductsNew($dateFrom){

        $statement=dataConnect()->prepare("SELECT 
                                        *
                                        FROM
                                        products
                                        Where
                                        date(product_created)
                                        BETWEEN
                                        :dateFrom and CURDATE()
                                        Order By
                                        product_created
                                        DESC");
        $statement->execute([
            'dateFrom' => $dateFrom
        ]);

        return $statement;

    }

?>