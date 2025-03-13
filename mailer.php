<?php
// get posted data into local variables
$EmailFrom = $_POST['emailaddress'];
$EmailTo = "ranjeet.ruprai@gmail.com";
$Subject = "RanjeetRuprai.com Contact form";
$Name = Trim(stripslashes($_POST['name'])); 
$Message = Trim(stripslashes($_POST['comments'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contact_error.htm\">";
  exit;
}

// prepare email body text
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $EmailFrom;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=index_success.html#contact\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=index_error.html#contact\">";
}
?>

