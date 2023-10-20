<?php 

//print_r($_POST);

$name = $_POST["name"];
$mobile  = $_POST["mobile"];
$city = $_POST["city"];
$date = $_POST["date"];
$buisness = $_POST["buisness"];
$time = $_POST["time"];
$signed = $_POST["signed"];

if (isset($signed)) {
    $folderPath = "upload/";
    $image_parts = explode(";base64,", $signed);
    if (count($image_parts) > 1) {
        $image_type_aux = explode("image/", $image_parts[0]);
        if (count($image_type_aux) > 1) {
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . uniqid('', true) . '.' . $image_type;
            if (file_put_contents($file, $image_base64)) {
                echo "Signature uploaded successfully.";
            } else {
                echo "Failed to upload the signature. Check file writing permissions.";
            }
        } else {
            echo "Invalid image type format.";
        }
    } else {
        echo "Invalid image data format.";
    }
} else {
    echo "No signature data received.";
}

$host = "localhost";
$dbname = "demo";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error: " . mysqli_connect_error());
}                        

$sql = "INSERT INTO contact (name, mobile, city, date, buisness, time, signature)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssssss",
                       $name,
                       $mobile,
                       $city,
                       $date,
                       $buisness,
                       $time,
                       $file);

mysqli_stmt_execute($stmt);

echo "Record saved.";

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

