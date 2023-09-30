<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/collageCommunity/css/user-info.css">
</head>
<body>
    <div class="logo">
        <h2>Pepcircles</h2>
    </div>
    <div>
        <form action="back/user_info.php" method="post">

            
            <div class="clg">
            <label for="College">College</label>
            <input type="text" id="clg" name="college" required>
            </div>

            <div class="sem">
                <div class="course">
                <label for="course">Course</label>
                <input type="text" id="course" name="course" required>
                </div>
                <div class="graduation year">
                <label for="graduation year">Graduating Year</label>
                <input type="number" id="gradyr" name="graduation year" min="2015" max="2030" step="1" required>
            </div>

            <div class="pr">
                <div class="age">
                <label for="age">Age</label>
                <input type="number_format" id="age" name="age" required>
                </div>
                <div class="gender">
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value=""></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    <option valuue="don't prefer to say">don't prefer to say</option>
                </select>
            </div>

            <div class="bio">
                <label for="bio">Bio</label><br>
                <textarea id="bio" name="bio" rows="3" cols="50"></textarea>
            </div>

            <!-- <div class="input-field">
                <div>Gender</div>
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="input-field">
            <div>Gender</div>
                <select name="dob" id="dob">
                    <option value="male">12</option>
                    <option value="female">MIT</option>
                    <option value="other">GMC</option>
                </select>
            </div>
            <div class="input-field">
            <div>Gender</div>
                <select name="institute" id="institute">
                    <option value="male">VNIT</option>
                    <option value="female">MIT</option>
                    <option value="other">GMC</option>
                </select>
            </div>
            <div class="input-field">
            <div>Gender</div>
                <select name="city" id="city">
                    <option value="male">Nagpur</option>
                    <option value="female">Mumbai</option>
                    <option value="other">Bhilwada</option>
                </select>
            </div>
            <div class="input-field">
            <div>Gender</div>
                <select name="state" id="state">
                    <option value="male">Maharashtra</option>
                    <option value="female">MIT</option>
                    <option value="other">GMC</option>
                </select>
            </div>
            <div class="input-field">
            <div>Gender</div>
                <select name="country" id="country">
                    <option value="male">India</option>
                    <option value="female">MIT</option>
                    <option value="other">GMC</option>
                </select>
            </div>
            <div class="input-field">
            <div>Gender</div>
                <select name="graduation-year" id="institute">
                    <option value="male">2024</option>
                    <option value="female">MIT</option>
                    <option value="other">GMC</option>
                </select>
            </div> -->
            <button type="submit" name="sub-btn">Submit</button>
        </form>
    </div>
</body>
</html>