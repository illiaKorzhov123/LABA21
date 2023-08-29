<?php
    if (isset($_POST['submit'])) {
        $selected_nurse_id = $_POST['nurse_id'];

        $servername = "127.0.0.1";
        $username = "root";
        $password = "password";
        $dbname = "nurses";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

       

        $stmt = $conn->prepare("SELECT w.name FROM ward w
                INNER JOIN nurse_ward nw ON nw.fid_ward = w.id_ward
                WHERE nw.fid_nurse = :selected");

        $stmt->bindParam(':selected', $selected_nurse_id); 

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            

        foreach ($result as $row) {
            echo '<h2>Палата: ' . $row["name"] . '</h2>';
        }        
        

        $conn = null;
    }
    ?>