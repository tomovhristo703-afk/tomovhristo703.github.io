<?php
// Simple password protection
$PASSWORD = "Ht075002@T"; // change this to something secure

if (isset($_POST['password'])) {
    if ($_POST['password'] === $PASSWORD) {
        $newPost = [
            "date" => date("F j, Y"),
            "message" => strip_tags($_POST['message'])
        ];

        $posts = json_decode(file_get_contents("posts.json"), true);
        array_unshift($posts, $newPost); // newest first
        file_put_contents("posts.json", json_encode($posts, JSON_PRETTY_PRINT));

        echo "Statement made successfully! <a href='admin.php'>Back</a>";
        exit;
    } else {
        echo "Wrong password!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Make Statement</title>
</head>
<body>
  <h1>Make a New Statement</h1>
  <form method="post">
    <textarea name="message" rows="5" cols="50" placeholder="Your statement here..." required></textarea><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Make Statement</button>
  </form>
</body>
</html>
