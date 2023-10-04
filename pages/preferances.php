<?php
 $page = "preferences";
 include "back/database_connection.php";
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
    <link rel="stylesheet" href="/collageCommunity/css/preferances.css">
</head>
<body>
    <div class="logo">
        <h2>Pepcircles</h2>
    </div>
    <form action="back/preferances_back.php" method="post">
        <h3>Select Your Interests</h3>

        <div class="card-container">
            <?php   if (mysqli_num_rows($pre_result) > 0) {
                        while ($pre_row = mysqli_fetch_assoc($pre_result)) {        
            ?>
            <label class="checkbox-container">
                <input type="checkbox" class="chk-bx" id="checkbox1" name="pre[]" value="<?php echo $pre_row['preferenceId']; ?>">
                <div class="card" data-card-id="1"><?php echo $pre_row['preferenceTitle']; ?></div>
            </label>
            <?php } }?>
        </div>

        <button type="submit" name="submit">Submit</button>
    </form>

    <script>
        // JavaScript code to handle card selection
        const cards = document.querySelectorAll('.card');
        // const selectedCards = [];

        cards.forEach(card => {
            card.addEventListener('click', () => {
                card.classList.toggle('selected');
                // const cardId = card.getAttribute('data-card-id');
                // if (card.classList.contains('selected')) {
                //     selectedCards.push(cardId);
                // } else {
                //     const index = selectedCards.indexOf(cardId);
                //     if (index !== -1) {
                //         selectedCards.splice(index, 1);
                //     }
                // }
            });
        });
        // Handle the submit button click
        // const submitButton = document.getElementById('submit-button');
        // submitButton.addEventListener('click', () => {
        //     console.log('Selected Cards:', selectedCards);
        //     });
    </script>
</body>
</html>