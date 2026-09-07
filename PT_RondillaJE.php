/*
    Name: Johann Ezekiel B. Rondilla
    Student Number: 2024109699
    Date: September 7, 2026
    Subject and Section: ITS122P-AM1
    Practical Test 1: Friendship Compatibility Form
*/

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Friendship Compatibility Form</title>

    <style>
        /* Basic style for the page as a whole */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        /* Main container */
        .container {
            max-width: 700px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #000000;
        }

        .person-section {
            margin-bottom: 25px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            border-left: 8px solid #007BFF;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Friendship Compatibility Form</h1>
    </div>

    <!-- Friendship Compatibility Form -->

    <form method="POST" action="">
        <div class="container">

            <!-- Information for Person 1 -->
            <div class="person-section">
                <h2>Person 1</h2>

                <label for="name1">Name:</label>
                <input type="text" id="name1" name="name1" required>

                <label for="birthday1">Birthday:</label>
                <input type="date" id="birthday1" name="birthday1" required>

            </div>
            
            <!-- Information for Person 2 -->
            <div class="person-section">
                <h2>Person 2</h2>

                <label for="name2">Name:</label>
                <input type="text" id="name2" name="name2" required>

                <label for="birthday2">Birthday:</label>
                <input type="date" id="birthday2" name="birthday2" required>

            </div>

            <button type="submit">Calculate Compatibility</button>
        </div>
    </form>

    <?php

        /*
        The function below is used to determine the person's zodiac sign based on their birthday.
        */
        function getZodiacSign($birthday) {
            $date = new DateTime($birthday);
            $month = (int)$date->format('m');
            $day = (int)$date->format('d');

            if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
                return "Aquarius";
            } elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
                return "Pisces";
            } elseif (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
                return "Aries";
            } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
                return "Taurus";
            } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
                return "Gemini";
            } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
                return "Cancer";
            } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
                return "Leo";
            } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
                return "Virgo";
            } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
                return "Libra";
            } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
                return "Scorpio";
            } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
                return "Sagittarius";
            } else {
                return "Capricorn";
            }
        }

        // The function below is used to count the number of common letters between the two names entered in the form.

        function countCommonLetters($name1, $name2) {
            // Convert both names to uppercase to ensure case-insensitive comparison
            $name1 = strtoupper($name1);
            $name2 = strtoupper($name2);

            // Removes spaces and keeps letters only
            $name1 = preg_replace('/[^A-Z]/', '', $name1);
            $name2 = preg_replace('/[^A-Z]/', '', $name2);

            $commonLetters = "";
            $commonLetterCount = 0;

            // Checks every character in the first person's name
            for ($i = 0; $i < strlen($name1); $i++) {
                $letter = $name1[$i];

                // Checks if the letter is present in the second person's name
                if (strpos($name2, $letter) !== false) {

                    // Adds the letter to the common letters list if it hasn't been added yet
                    if (strpos($commonLetters, $letter) === false) {
                        $commonLetters .= $letter . ", ";
                    }

                    // Increments the count of common letters
                    $commonLetterCount++;
                }
            }

            // Checks every character in the second person's name
            for ($i = 0; $i < strlen($name2); $i++) {
                $letter = $name2[$i];

                if (strpos($name1, $letter) !== false) {
                    $commonLetterCount++;
                }
            }

            // Removes the extra comma and space at the end of the common letters list
            $commonLetters = rtrim($commonLetters, ", ");

            return [
                "letters" => $commonLetters,
                "count" => $commonLetterCount
            ];
        }
        
        // The function below is used to determine the friendship rating based on the final compatibility score.
        function getFriendshipRating($score) {
            if ($score <= 2) {
                return "New Acquaintances";
            } elseif ($score <= 4) {
                return "Casual Friends";
            } elseif ($score <= 6) {
                return "Good Friends";
            } elseif ($score <= 8) {
                return "Very Good Friends";
            } else {
                return "Best Friends";
            }
        }

        if (isset($_POST['calculate'])) {

            // Get the information submitted by the user
            $name1 = trim($_POST['name1']);
            $birthday1 = trim($_POST['birthday1']);

            $name2 = trim($_POST['name2']);
            $birthday2 = trim($_POST['birthday2']);

            // Creates DateTime objects for both birthdays
            $date1 = new DateTime($birthday1);
            $date2 = new DateTime($birthday2);

            // Gets the birth month names
            $month1 = $date1->format('F');
            $month2 = $date2->format('F');

            // Gets the zodiac signs for both persons
            $zodiac1 = getZodiacSign($birthday1);
            $zodiac2 = getZodiacSign($birthday2);

            // Counts the common letters between the two names and determine and their total occurrences
            $commonLetterResult = countCommonLetters($name1, $name2);

            $commonLetters = $commonLetterResult["letters"];
            $commonLetterCount = $commonLetterResult["count"];

            // Checks if both persons were born in the same month
            if ($date1->format('m') == $date2->format('m')) {
                $birthMonthBonus = 2;
            } else {
                $birthMonthBonus = 0;
            }

            //Calculates the final compatibility score
            $compabilityScore = $commonLetterCount + $birthMonthBonus;

            // Determines the friendship rating based on the final compatibility score
            $friendshipRating = getFriendshipRating($compabilityScore);

            // Displays the results using PHP scho statements
            echo '<div class="result">';

            echo '<h2>Friendship Compatibility Result</h2>';

            echo '<p><strong>Person 1:</strong> ' . htmlspecialchars($name1) . '</p>';
            echo '<p><strong>Person 1 Zodiac Sign:</strong> ' . $zodiac1 . '</p>';
            echo '<p><strong>Person 1 Birth Month:</strong> ' . $month1 . '</p>';

            echo '<hr>';

            echo '<p><strong>Person 2:</strong> ' . htmlspecialchars($name2) . '</p>';
            echo '<p><strong>Person 2 Zodiac Sign:</strong> ' . $zodiac2 . '</p>';
            echo '<p><strong>Person 2 Birth Month:</strong> ' . $month2 . '</p>';

            echo '<hr>';

            echo '<p><strong>Common Letters:</strong> ' . $commonLetters . '</p>';
            echo '<p><strong>Common Letter Count:</strong> ' . $commonLetterCount . '</p>';
            echo '<p><strong>Birth Month Bonus:</strong> +' . $birthMonthBonus . '</p>';
            echo '<p><strong>Compatibility Score:</strong> ' . $compatibilityScore . '</p>';

            echo '<h3>Friendship Compatibility Rating:</h3>';
            echo '<p><strong>' . $friendshipRating . '</strong></p>';

            echo '</div>';
        }
    ?>
</body>

</html>