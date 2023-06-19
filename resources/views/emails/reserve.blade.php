<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reservation success</title>
</head>
<body>
    <h2>Hello {{ $reserve['name']}},</h2>

	<h4>Your reservation was successful.</h4>

	<p>If there is anything else you want to know, kindly reach back to us</p>

	<p>
        regards,
        
        {{$setting->name ?? 'Aheri Hotel'}}, {{$setting->phone ?? ''}}
	</p>

</body>
</html>