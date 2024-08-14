<div class="main-content" id="main-content">
        <div class="sign-in-container">
            <h2>Sign Up</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Student ID/Phone number</label>
                    <input type="text" id="username" name="student_number" required>
                </div>
                <div class="form-group">
                    <label for="Fullname">Fullname</label><br>
			        <input id="text" type="text" name="full_name"><br><br>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                	<label class="form-label">Profile Picture</label>
		            <input type="file" class="form-control" name="pp" required>
                </div>

                <button  id="button" type="submit" value="Signup">Sign In</button>
            </form>
            <p>Already have an account?<a href="./login.php">Login</a></p>
        </div>
    </div>