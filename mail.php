<?php

// if there is post
if(isset($_POST) && !empty(_POST) ) {
// if there is an attachment
if(empty($_Files['attachment']['name'])) {
// store some variables
$file_name = $_files['attachment ']['name'];
$temp_name = $_files['attachment ']['tmp_name'];
$file_type = $_files['attachment']['type'];
// get the extension of the file
$base = basename($file_name):
$extension substr($base, strlen($base)-4, strlen($base));
//only these file types will be allowed
$allowed_extensions = array(".doc", "docx",".pdf"," zip",".png");
// check that this file type is allowed
if(in_array($extension, $allowed_extensions)) {

  //mail essentials
  $from =  $_POST[ 'email' ];
  $to = "rajatktak@gmail.com";
  $subject = "Your watching youtube";
  $message = "this is a random message";

  // things you need
$file = $tmp_name;
$content = chunk_split(base64_encode(file_get_contents($file)));
$uid = md5(uniqid(time()));
// standard mail headers
$hredder ="From: ".$from."\r\n";
$header .= "Reply-To: ".$replyto."\r\n":
$header .="MIME-Version: 1.0\r\n":

// declaring we have multiple kinds of email (i.e plain text and attachment
$header .=  "Content-Type: multipart/mixed; boundary-"".$uid."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";

// plain text part
$header.= "--" .$uid. "\r\n";
$header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$header .="Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message."\r\n\r\n";
//file attachment
$header .= "--". $uid. "\r\n";
$header .= "Content-Type: ".$file_type."; name=\"" $file_name. "\"\r\n";
$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\"".$file_name."\"";
$header .= $Content. "\r\n\r\n";

if (mail($to,$subject,"",$header)){
  echo "sucess";
}else{echo "fail"}
} else {
echo "file type not allowed";
} else {
echo "no file posted";}
}
?>
