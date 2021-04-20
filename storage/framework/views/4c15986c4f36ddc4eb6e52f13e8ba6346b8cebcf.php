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
		<tr><td>Name: <?php echo e($fname); ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Email: <?php echo e($email); ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Subject: <?php echo e($subject); ?></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Message: <?php echo e($comment); ?></td></tr>
		<tr><td>&nbsp;</td></tr> 
	</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/emails/enquiry.blade.php ENDPATH**/ ?>