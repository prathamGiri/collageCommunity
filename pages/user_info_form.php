<?php 
    $page = "user_info_form";
    include "back/connection.php";
    include "back/functions.php";
?>

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
                <label for="college">College</label>
                <select name="college" id="college">
                    <option value=""></option>
                    <?php
                        $clg_res = mysqli_query($conn, "SELECT * FROM colleges");
                        if (mysqli_num_rows($clg_res) > 0) {
                            while ($clg_row = mysqli_fetch_assoc($clg_res)) {
                    ?>
                    <option value="<?php echo  $clg_row['collegeId']; ?>"><?php echo  $clg_row['collegeName']; ?></option>
                    <?php
                            } }
                    ?>
                </select>
                <!-- <div class="search_cover">
                    <div>
                        <input type="text" class="coname" page="" id="live_search" name="institute" autocomplete="off" required>
                    </div>
                    <div id="search_result"></div>
                </div> -->
                
            <!-- <input type="text" id="clg" name="college" required> -->
            </div>

            <div class="sem">
                <div class="course">
                <label for="course">Course</label>
                <input type="text" id="course" name="course" required>
                </div>
                <div class="graduation year">
                <label for="graduation year">Graduating Year</label>
                <input type="number" id="gradyr" name="graduation_year" min="2015" max="2030" step="1" required>
            </div>

            <div class="pr">
                <div class="age">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" required>
                </div>
                <div class="gender">
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value=""></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    <option value="don't prefer to say">don't prefer to say</option>
                </select>
            </div>

            <div class="bio">
                <label for="bio">Bio</label><br>
                <textarea id="bio" name="bio" rows="3" cols="50"></textarea>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/collageCommunity/javascript/live_searchs.js"></script>
</body>
</html>