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
        <div class="card" data-card-id="1">AI/ML</div>
        <div class="card" data-card-id="2">MUSIC</div>
        <div class="card" data-card-id="3">DANCE</div>
        <div class="card" data-card-id="4">ANALOG</div>
        <div class="card" data-card-id="5">COSULTANCY</div>
        <div class="card" data-card-id="6">PROGRAMMING</div>
        <div class="card" data-card-id="7">ROBOTICS</div>
        <div class="card" data-card-id="8">DRAMA</div>
        <div class="card" data-card-id="9">CRYPTO</div>
        <div class="card" data-card-id="1">AI/ML</div>
        <div class="card" data-card-id="2">MUSIC</div>
        <div class="card" data-card-id="3">DANCE</div>
        <div class="card" data-card-id="4">ANALOG</div>
        <div class="card" data-card-id="5">COSULTANCY</div>
        <div class="card" data-card-id="6">PROGRAMMING</div>
        <div class="card" data-card-id="7">ROBOTICS</div>
        <div class="card" data-card-id="8">DRAMA</div>
        <div class="card" data-card-id="9">CRYPTO</div>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        // JavaScript code to handle card selection
        const cards = document.querySelectorAll('.card');
        const selectedCards = [];

        cards.forEach(card => {
            card.addEventListener('click', () => {
                card.classList.toggle('selected');
                const cardId = card.getAttribute('data-card-id');
                if (card.classList.contains('selected')) {
                    selectedCards.push(cardId);
                } else {
                    const index = selectedCards.indexOf(cardId);
                    if (index !== -1) {
                        selectedCards.splice(index, 1);
                    }
                }
            });
        });

        // Handle the submit button click
        const submitButton = document.getElementById('submit-button');
        submitButton.addEventListener('click', () => {
            // Here, you can do something with the selected cards, such as sending them to a server.
            console.log('Selected Cards:', selectedCards);
            // You can replace the console.log with your own logic to submit the selected cards.
        });
    </script>
</body>
</html>