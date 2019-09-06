<?php
	session_start();
	include 'connect.php';
	if (isset($_POST['btnLogin'])) {
		if (empty($_POST["email"]) || empty($_POST["pass"])) {
			$message = '<lable>Vui lòng điền đầy đủ thông tin!!</lable>';
			echo $message;
		}
		else{
            $sql = "SELECT * FROM account WHERE email = :email AND password = :pass";
            $statement=$conn->prepare($sql);
            $statement ->execute(
            	array(
            		'email' => $_POST["email"],
            		'pass' => $_POST["pass"]
            	)
            );
            $count = $statement ->rowCount();
            if($count>0){
            	$_SESSION["email"] = $_POST["email"];
            	header('location: wunderlist.php');
            }
            else{
            	echo "<lable>Tài Khoản mật khẩu không chính xác!!</lable>";
            }
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">
		<p>
          This site uses cookies for analytics, personalized content and ads. By continuing to browse this site, you agree to this use.
          <a href="#">Learn more</a>
         </p>
		</div>
		<div class="container">
			<div class="logo">
				<img src="image/logo.png">
			</div>
			<div class="fLogin">
				<form method="post">
					<ul>
					<li>
						<svg width="21px" height="18px" viewBox="0 0 21 18" version="1.1" xmlns="http://www.w3.org/2000/svg">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-248.000000, -339.000000)" stroke-linecap="round" stroke="#2B88D9" stroke-linejoin="round">
									<g transform="translate(231.000000, 238.000000)">
										<g transform="translate(0.000000, 20.000000)">
											<g transform="translate(0.000000, 20.000000)">
												<g transform="translate(0.000000, 60.000000)">
													<path d="M37,4.46153846 C37,3.10153846 35.8663333,2 34.4666667,2 L20.5333333,2 C19.1336667,2 18,3.10153846 18,4.46153846 L18,15.5384615 C18,16.8984615 19.1336667,18 20.5333333,18 L34.4666667,18 C35.8663333,18 37,16.8984615 37,15.5384615 L37,4.46153846 L37,4.46153846 Z M20.5333333,4.46153846 L27.5,11.2307692 L34.4666667,4.46153846"></path>
												</g>
											</g>
										</g>
									</g>
								</g>
							</g>
						</svg>
						<input type="text" name="email" placeholder=" Email" class="mauxanh">
					</li>
					<li>
						<svg width="21px" height="25px" viewBox="0 0 21 25" version="1.1" xmlns="http://www.w3.org/2000/svg">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-247.000000, -396.000000)" stroke-linecap="round" stroke="#2B88D9" stroke-linejoin="round">
									<g transform="translate(231.000000, 238.000000)">
										<g transform="translate(0.000000, 20.000000)">
											<g transform="translate(0.000000, 20.000000)">
												<g transform="translate(0.000000, 119.000000)">
													<path d="M36,12.9375 C36,12.144 35.3452308,11.5 34.5384615,11.5 L18.4615385,11.5 C17.6547692,11.5 17,12.144 17,12.9375 L17,21.5625 C17,22.356 17.6547692,23 18.4615385,23 L34.5384615,23 C35.3452308,23 36,22.356 36,21.5625 L36,12.9375 L36,12.9375 Z M19.9230769,11.5 L19.9230769,6.46875 C19.9230769,2.8965625 22.8680769,0 26.5,0 C30.1319231,0 33.0769231,2.8965625 33.0769231,6.46875 L33.0769231,11.5 L19.9230769,11.5 Z M22.8461538,8.625 L22.8461538,6.46875 C22.8461538,4.4835625 24.4816154,2.875 26.5,2.875 C28.5183846,2.875 30.1538462,4.4835625 30.1538462,6.46875 L30.1538462,8.625"></path>
												</g>
											</g>
										</g>
									</g>
								</g>
							</g>
						</svg>
						<input type="password" name="pass" placeholder="Password">
					</li>
					<li>
						<input type="submit" name="btnLogin" value=" Login" class="mauxanh">
					</li>
					<li><a href="#">Forgot your password?</a></li>	
				</ul>
				</form>
			</div>
		</div>
	</div>
</body>
</html>