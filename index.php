<!DOCTYPE html>
<html>
<head>
    <title>Выбор медсестры</title>
</head>
<body>
    <h1>Выберите медсестру:</h1>
    <form method="post" action="1.php">
        <select name="nurse_id">
            <?php
            // Подключение к базе данных
            $servername = "127.0.0.1";
            $username = "root";
            $password = "password";
            $dbname = "nurses";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

           

            $sql = "SELECT id_nurse, name FROM nurse";
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            
            foreach ($result as $row) {
                echo '<option value="' . $row["id_nurse"] . '">' . $row["name"] . '</option>';
            }
            

            $conn = null;
            ?>
        </select>
        <input type="submit" name="submit" value="Отправить">
    </form>



    <h1>Выберите отделение:</h1>
    <form method="post" action="2.php">
        <select name="department_id">
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "password";
            $dbname = "nurses";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            

            $sql = "SELECT id_ward, name FROM ward";
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            
                foreach ($result as $row) {
                    echo '<option value="' . $row["id_ward"] . '">' . $row["name"] . '</option>';
                }
            

            $conn = null;

            ?>
        </select>
        <input type="submit" name="submit" value="Отправить">
    </form>
    


    <h1>Выберите смену:</h1>
    <form method="post" action="3.php">
    <select name="shift">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "password";
            $dbname = "nurses";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $sql = "SELECT DISTINCT `shift` FROM nurse";
            $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            
            foreach ($result as $row) {
                    echo '<option value="' . $row["shift"] . '">' . $row["shift"] . '</option>';
            }
            

            $conn = null;

            ?>
        </select>
        <input type="submit" name="submit" value="Отправить">
    </form>

</body>
</html>