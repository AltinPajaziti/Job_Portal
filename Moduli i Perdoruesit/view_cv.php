<?php
session_start();

include('config.php');
$id = $_REQUEST['Id_Perdoruesi'];


$sql = "SELECT Cv FROM perdoruesi WHERE Id_Perdoruesi=?";
$stmt = mysqli_prepare($lidhe, $sql);
if($id){
    mysqli_stmt_bind_param($stmt, 'i', $id);

}
else{
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['id']);

}
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $cvData);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if (!empty($cvData)) {
    header("Content-type: application/pdf");
    
    echo $cvData;
} else {
    echo "CV not found.";
}
?>
