<html>
<body>
<form action="?action=createComment" method="POST">
    <label for="content">Вміст:</label>
    <input type="text" id="content" name="content" required><br><br>

    <label for="user_id">user_id:</label>
    <input type="number" id="user_id" name="user_id" required><br><br>

    <label for="post_id">post_id:</label>
    <input type="number" id="post_id" name="post_id" required><br><br>

    <button type="submit">Відправити</button>
</form>
</body>
</html>
