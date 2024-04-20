<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    <script src="https://kit.fontawesome.com/cb7394df23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styling/style.css">
</head>

<body>
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <h2>Applications for Your Rooms</h2>
        <div class="application-list">
            <!-- Application item -->
            <div class="application">
                <div class="application-detail">
                <div class="applicant-info">
                    <p><strong>Applicant name</strong> applicant id</p>
                    <p>+62 xxxx</p>
                </div>
                <div class="applied-room">
                    <p><strong>Kos a</strong> Room type</p>
                    <p>Room 5</p>
                </div>
                </div>
                <div class="application-actions">
                    <button class="accept-btn"><i class="fa-regular fa-circle-check"></i></button>
                    <button class="reject-btn"><i class="fa-regular fa-circle-xmark"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const applicationItems = document.querySelectorAll('.application');
            applicationItems.forEach(application => {
                // Get the accept and reject buttons for each application item
                const acceptButton = application.querySelector('.accept-btn');
                const rejectButton = application.querySelector('.reject-btn');

                // Define an object to track the selection state
                const buttonState = {
                    accept: false,
                    reject: false
                };

                // Add click event listener to the accept button
                acceptButton.addEventListener('click', function () {
                    if (!buttonState.accept) {
                        acceptButton.style.color = '#4CAF50';
                        rejectButton.style.display = 'none';

                        buttonState.accept = true;
                        buttonState.reject = false;
                    } else {
                        acceptButton.style.color = ''; 
                        rejectButton.style.display = '';

                        buttonState.accept = false;
                    }
                });

                // Add click event listener to the reject button
                rejectButton.addEventListener('click', function () {
                    if (!buttonState.reject) {
                        rejectButton.style.color = '#f44336';
                        acceptButton.style.display = 'none';

                        buttonState.reject = true;
                        buttonState.accept = false;
                    } else {
                        rejectButton.style.color = ''; 
                        acceptButton.style.display = '';

                        buttonState.reject = false;
                    }
                });
            });
        });

    </script>
</body>

</html>
