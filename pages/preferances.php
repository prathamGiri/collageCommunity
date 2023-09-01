<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="/collageCommunity/css/preferances.css">
</head>
<body>
    <div class="logo">
        <h2>Pepcircles</h2>
    </div>
    <form action="back/preferances_back.php" method="post">
        <h3>select your Interests</h3>
        <input type="radio" id="snt" name="snt" value="snt">
        <label for="snt">Science & Technology</label><br>
        <input type="radio" id="robotics" name="robotics" value="robotics">
        <label for="robotics">Robotics</label><br>
        <input type="radio" id="dance" name="dance" value="dance">
        <label for="dance">Dance</label>
        <button type="submit">Submit</button>
    </form>
</body>
</html>