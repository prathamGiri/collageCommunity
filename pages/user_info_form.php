<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="/collageCommunity/css/user-info.css">
</head>
<body>
    <div class="logo">
        <h2>Pepcircles</h2>
    </div>
    <div>
        <form action="back/user_info.php" method="post">
            <div class="input-field">
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
            </div>
            <button type="submit" name="sub-btn">Submit</button>
        </form>
    </div>
</body>
</html>