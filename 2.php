<?php
// Обработка формы
if (isset($_POST['submit'])) {

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "nurses";
    $selected_department_id = $_POST['department_id'];

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $stmt = $conn->prepare("SELECT n.name FROM nurse n
            INNER JOIN nurse_ward nw ON nw.fid_nurse = n.id_nurse
            WHERE nw.fid_ward = :selected");

    $stmt->bindParam(':selected', $selected_department_id);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<table>';
    echo '<tr><th>Nurse Name</th></tr>';
    
    foreach ($result as $row) {
        echo '<tr><td>' . $row["name"] . '</td></tr>';
    }
    
    echo '</table>';

    $conn = null;
}
?>