<?php

	if (isset($_POST['submit'])) {
		include_once 'config.php';

		$first = mysqli_real_escape_string($conn, $_POST['first']);
		$last = mysqli_real_escape_string($conn, $_POST['last']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		// ERROR HANDLERS
		if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
			// header("Location: ../register.php?register=empty");
			// exit();
			echo '<script language="javascript">alert("Please fill in all fields")</script>';
			echo '<script language="javascript">window.location="../register.php";</script>';
		} else {
			// CHECK IF INPUT CHARACTERS ARE VALID
			if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
				// header("Location: ../loginForm.php?register=invalid");
				// exit();
				echo '<script language="javascript">alert("First name or last name is invalid")</script>';
				echo '<script language="javascript">window.location="../register.php";</script>';
			} else {
				// CHECK IF EMAIL IS VALID
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					// header("Location: ../register.php?email");
					echo '<script language="javascript">alert("Please enter a valid email address")</script>';
					echo '<script language="javascript">window.location="../register.php";</script>';
					// exit();
				} else {
					// header("Location: ../register.php?email");

					$sql = "SELECT * FROM users WHERE user_uid = '$uid'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck > 0) {
						// header("Location: ../register.php?register=userTaken");
						// exit();
						echo '<script language="javascript">alert("User already taken. Please try again.")</script>';
						echo '<script language="javascript">window.location="../register.php";</script>';
					} else {
						// HASHING THE PASSWORD
						$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

						// INSERT THE USER INTO THE DATABASE
						$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
						$result = mysqli_query($conn, $sql);

						// header("Location: ../loginForm.php?register=success");
						// header("Location: ../member.php");
						header("Location: ../register.php?");
						exit();
					}
				}
			}
		}
	} else {
		header("Location: ../login.php");
		exit();
	}