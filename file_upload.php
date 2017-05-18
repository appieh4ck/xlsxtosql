<?php
error_reporting(E_ALL);
require_once "Classes/PHPExcel.php";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "leerlingen";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
   $uploadOk = 1;
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "xlsx") {
    echo "Excel only maat!";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$excelReader = PHPExcel_IOFactory::createReaderForFile($target_file);
$excelObj = $excelReader->load($target_file);
$worksheet = $excelObj->getSheet(0);
$lastRow = $worksheet->getHighestRow();

$letters = range('A', 'V');
foreach ($letters as $one) {
    for ($row = 2; $row <= $lastRow; $row++) {
        echo $one . $row;
        $data = $worksheet->getCell($one.$row)->getValue();
       
       
        echo "<br>";
        if ($one = 'A'){
            $sql = "INSERT INTO data (PNo) VALUES ('$data')";
            mysqli_query($conn, $sql);

        }
        if ($one = 'B'){
            $sql = "INSERT INTO data (Stamboeknummer) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'C'){
            $sql = "INSERT INTO data (Naam) VALUES ('$data')";
            mysqli_query($conn, $sql);
           
            
        }
        if ($one = 'D'){
            $sql = "INSERT INTO data (Voornaam) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'E'){
            $sql = "INSERT INTO data (Roepnaam) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'F'){
            $sql = "INSERT INTO data (NaamS) VALUES ('$data')";
            
        }
        if ($one = 'G'){
            $sql = "INSERT INTO data (VoornaamS) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'H'){
            $sql = "INSERT INTO data (Geslacht) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'I'){
            $sql = "INSERT INTO data (Geboortedatum) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'J'){
            $sql = "INSERT INTO data (Geboorteplaats) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'K'){
            $sql = "INSERT INTO data (Rijksregisternummer) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'L'){
            $sql = "INSERT INTO data (Nationaliteit) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'M'){
            $sql = "INSERT INTO data (Straat) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'N'){
            $sql = "INSERT INTO data (Huisnummer) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'O'){
            $sql = "INSERT INTO data (Postbus) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'P'){
            $sql = "INSERT INTO data (Gemeente) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'Q'){
            $sql = "INSERT INTO data (Postcode) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'R'){
            $sql = "INSERT INTO data (Telefoon) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'S'){
            $sql = "INSERT INTO data (M_Nation) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'T'){
            $sql = "INSERT INTO data (M_Beroep) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'U'){
            $sql = "INSERT INTO data (Klas) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
        if ($one = 'V'){
            $sql = "INSERT INTO data (Klas_Nr) VALUES ('$data')";
            mysqli_query($conn, $sql);
        }
    }
}




// Create connection
echo "Memes";


$conn->close();

?>