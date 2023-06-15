<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FK-EduSearch User Interface</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h1>FK-Edusearch User Interface</h1>

  <div class="post-section">
    <h2>Create a Post</h2>
    <form id="post-form">
      <label for="post-title">Title:</label>
      <input type="text" id="post-title" required>
      <br>
      <label for="post-content">Content:</label>
      <textarea id="post-content" required></textarea>
      <br>
      <button type="submit">Create Post</button>
    </form>
  </div>

  <div class="comment-section">
    <h2>Add a Comment</h2>
    <form id="comment-form">
      <label for="comment-post-id">Post ID:</label>
      <input type="text" id="comment-post-id" required>
      <br>
      <label for="comment-content">Comment:</label>
      <textarea id="comment-content" required></textarea>
      <br>
      <button type="submit">Add Comment</button>
    </form>
  </div>

  <div class="like-section">
    <h2>Add a Like</h2>
    <form id="like-form">
      <label for="like-post-id">Post ID:</label>
      <input type="text" id="like-post-id" required>
      <br>
      <button type="submit">Add Like</button>
    </form>
  </div>

  <script src="scripts.js"></script>
</body>
</html>
