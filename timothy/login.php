<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container" id="sign-up">
		<form action="register_system.php" method="post">
			<h1>Create Account</h1>
			<input type="text" placeholder="Name" name="name" required/>
            <input type="text" placeholder="Username" name="username" required/>
			<input type="email" placeholder="Email" name="email" required/>
			<input type="password" placeholder="Password" name="password" required/>
            <select class="pilih" name="user_status" required>
            <option value="" disabled selected>Pilih</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            </select>
            <br>
			<button type="submit" value="Register">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="login_system.php" method="post">
			<h1>Sign in</h1>
			<input type="text" placeholder="Username" name="username" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<button type="submit" value="Login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</body>

<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</html>