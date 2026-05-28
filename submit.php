<?php

// =====================
// GET FORM DATA
// =====================
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$date = date("Y-m-d H:i:s");

// =====================
// OWNER EMAIL
// =====================
$to = "saturnwebmedia1@gmail.com";

$mailSubject = "New Inquiry from Website";

$body = "
New Inquiry Received:

Name: $name
Email: $email
Subject: $subject
Message: $message
Date: $date
";

$headers = "From: saturnwebmedia1@gmail.com\r\n";
$headers .= "Reply-To: $email\r\n";

// Send email
mail($to, $mailSubject, $body, $headers);

// =====================
// SAVE IN WORD FILE
// =====================
$file = "inquiries.doc";

$html = "
<table border='1' cellpadding='8' cellspacing='0' width='100%'>
<tr style='background:#5057cd;color:#fff;'>
<th>Name</th>
<th>Email</th>
<th>Subject</th>
<th>Message</th>
<th>Date</th>
</tr>
<tr>
<td>$name</td>
<td>$email</td>
<td>$subject</td>
<td>$message</td>
<td>$date</td>
</tr>
</table>
<br>
";

file_put_contents($file, $html, FILE_APPEND);

// =====================
// SUCCESS MESSAGE
// =====================
echo "<script>
alert('Your inquiry has been sent successfully!');
window.location.href='contact-us.html';
</script>";

?>