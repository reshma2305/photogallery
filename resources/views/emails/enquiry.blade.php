<!DOCTYPE html>
<html>
<head>
	<title>Enquiry Email</title>
</head>
<body>
	<table>
		<tr><td>Dear Admin</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>User Enquiry details are as below:</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Name: {{ $fname }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Email: {{ $email }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Subject: {{ $subject }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Message: {{ $comment }}</td></tr>
		<tr><td>&nbsp;</td></tr> 
	</table>
</body>
</html>