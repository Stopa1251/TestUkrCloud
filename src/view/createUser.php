
<html>
<body>
<form action="?action=createUser" method="POST" onsubmit="return validateForm(event)">
    <label for="name">Ім'я:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Відправити</button>
</form>
</body>
    <script>
        function validateForm(event) {
            const email = document.getElementById('email').value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(email)) {
                alert('Будь ласка, введіть коректний email.');
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</html>






