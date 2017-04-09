<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="An interactive and smart campus calendar.">
        <meta name="google-signin-client_id" content="37271453099-cs4rsgo68n82uf2mmh1d63483a2gvq2v.apps.googleusercontent.com">
        <title>Campus Calendar</title>
        <link rel="stylesheet" href="calendar.css">
        <script src="calendar.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </head>
    <body>
        <?php
            $googleID = $eventTitle = $eventDescription = $eventTimeFrom = $eventTimeTo = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $googleID = test_input($_POST["googleID"]);
                $eventTitle = test_input($_POST["eventTitle"]);
                $eventDescription = test_input($_POST["eventDescription"]);
                $eventDate = test_input($_POST["eventDate"]);
                $eventTimeFrom = test_input($_POST["eventTimeFrom"]);
                $eventTimeTo = test_input($_POST["eventTimeTo"]);
                //echo $eventTitle.$eventDescription.$eventDate.$eventTimeFrom.$eventTimeTo;
                require 'insertIntoTable.php';
                require 'showTable.php';
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
        ?>

        <div id="heading">
            <h1>Campus Calendar</h1>
        </div>
        <div id="calendar">
            <div id="tableTop">
                <div class="g-signin2 googleSignIn" data-onsuccess="onSignIn"></div>
                <span id="heading2"></span>
            </div>
            <div id="eventPopup">
                <span id="closePopupButton">&times;</span>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <input id="googleID" name="googleID" value="0000"></input>
                    Event Title:<br>
                    <input type="text" name="eventTitle" id="eventTitle" maxlength="15" size="20" placeholder="Code.fun.do" required><br><br>
                    Event Description:<br>
                    <textarea name="eventDescription" rows="5" cols="50"></textarea><br><br>
                    Event Date:<br>
                    <input type="date" name="eventDate" id="eventDate" value="1999-01-01" readonly><br><br>
                    <div class="eventTime" id="eventTimeFrom">
                        From: <br>
                        <input type="time" name="eventTimeFrom" value="17:00:00">
                    </div>
                    <div class="eventTime">
                        To: <br>
                        <input type="time" name="eventTimeTo" value="20:00:00">
                    </div>
                    <br><br>
                    <input id="eventSave" type="submit" name="submit" value="Save">
                </form>
            </div>
            <table id="calendarTable">
                <tr>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                    <th>Sun</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </body>
</html>