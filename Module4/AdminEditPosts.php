<!-- edit_post.php -->

<!DOCTYPE html>
<html>
<title>FKeduSearch.com</title>
<head>
    <title>Edit Status</title>
    <style>
    
    body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .form-group .error-message {
            color: red;
            margin-top: 5px;
        }

        .form-group .success-message {
            color: #8dc0ad;
            margin-top: 5px;
        }

        .form-group .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #8dc0ad;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-group .submit-btn:hover {
            background-color: #8dc0ad;
        }
    </style>
</head>
<body>
<?php
        $id_quest = isset($_GET['id_quest']) ? $_GET['id_quest'] : null;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "edusearch";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id_quest, question, statuss FROM quesdb WHERE id_quest = '$id_quest'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_quest = $row['id_quest'];
            $question = $row['question'];
            $statuss = $row['statuss'];
        } else {
            echo "Question not found.";
            exit();
        }

        $conn->close();
    ?>

    <div class="container">
        <h2>Update Status</h2>
        <form method="POST" action="AdminUpdatePosts.php">
            <div class="form-group">
                <input type="hidden" name="id_quest" value="<?php echo $id_quest; ?>">
                <label for="question">Question:</label>
                <input type="text" name="Question" id="Question" value="<?php echo $question; ?>" required><br>
            </div>
            <div class="form-group">
                <select id="statuss" name="statuss" required>
                    <option value="InInvestigation" <?php echo $statuss === 'InInvestigation' ? 'selected' : ''; ?>>In Investigation</option>
                    <option value="OnHold" <?php echo $statuss === 'OnHold' ? 'selected' : ''; ?>>On Hold</option>
                    <option value="Resolved" <?php echo $statuss === 'Resolved' ? 'selected' : ''; ?>>Resolved</option>
                </select>    
            </div>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>