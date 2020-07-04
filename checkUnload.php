<!DOCTYPE html>
<html>
<head>
	<title>Check Unload Function in Javascript</title>
</head>
<body onbeforeunload="return logout()">
	<script>
		function logout() {
			window.alert('Want to Logout???');
		}
	</script>
</body>
</html>