<?php

    $selected_shift = $_POST['shift'];

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "nurses";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   

    $stmt = $conn->prepare("SELECT n.name, w.name AS ward_name FROM nurse n
            INNER JOIN nurse_ward nw ON nw.fid_nurse = n.id_nurse
            INNER JOIN ward w ON w.id_ward = nw.fid_ward
            WHERE n.shift = :selected");

            
    
    $stmt->bindParam(':selected', $selected_shift);

    
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
    $conn = null;

?>
