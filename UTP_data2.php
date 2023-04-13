<?php
session_start();
require('connection.php');

if(!isset($_SESSION['id'])){
    header("Location: adminlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remark Page</title>
    <style>
        /* Style for the chat button */
        .chat-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Style for the popup chat window */
        .chat-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 1px solid #555;
            background-color: white;
            width: 300px;
            max-height: 400px;
            overflow-y: scroll;
            border-radius: 5px;
        }

        /* Style for the chat messages */
        .chat-message {
            padding: 10px;
            font-size: 14px;
            word-break: break-all;
            border-bottom: 1px solid #ddd;
        }

        /* Style for the chat input field */
        .chat-input {
            border: none;
            padding: 10px;
            width: 100%;
            resize: none;
            font-size: 14px;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Style for the chat submit button */
        .chat-submit {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Form for the required fields -->
    <form action="submit.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile"><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state"><br>

        <label for="district">District:</label>
        <input type="text" id="district" name="district"><br>

        <label for="tehsil">Tehsil:</label>
        <input type="text" id="tehsil" name="tehsil"><br>

        <label for="call-status">Call Status:</label>
        <select id="call-status" name="call-status">
            <option value="called">Called</option>
            <option value="not-called">Not Called</option>
        </select><br>

        <label for="remark">Remark:</label>
        <textarea id="remark" name="remark"></textarea><br>

        <input type="submit" value="Submit">
    </form>

    <!-- Chat popup window -->
    <div class="chat-popup" id="myPopup">
        <div id="chat-messages"></div>
        <textarea id="chat-input" placeholder="Type your message here..."></textarea>
        <button id="chat-submit" class="chat-submit">Send</button>
        <button id="chat-close">Close</button>
    </div>

    
    
    <!-- Chat button -->
    <button class="chat-btn" id="chat-btn">Chat</button>

    <!-- JavaScript code for the chat popup window -->
    <script>
        // Get the chat popup window and button
        var popup = document.getElementById("myPopup");
        var chatButton = document.getElementById("chat-btn");

        // When the chat button is clicked, show the popup window
        chatButton.addEventListener("click", function() {
            popup.style.display = "block";
        });

        // When the user clicks outside of the popup window, hide it
        window.addEventListener("click", function(event) {
            if (event.target == popup) {
                popup.style.display = "none";
            }
        });

        // When the user clicks the close button, hide the popup window
        document.getElementById("chat-close").addEventListener("click", function() {
            popup.style.display = "none";
        });

        // When the user clicks the send button, send the message
        document.getElementById("chat-submit").addEventListener("click", function() {
            var message = document.getElementById("chat-input").value.trim();
            if (message != "") {
                var now = new Date();
                var timestamp = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
                var chatMessage = "<strong>You:</strong> " + message + " <small>(" + timestamp + ")</small><br>";
                document.getElementById("chat-messages").innerHTML += chatMessage;
                document.getElementById("chat-input").value = "";
            }
        });
    </script>

</body>
</html>

