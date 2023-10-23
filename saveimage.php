<?php
if (isset($_POST['selfie'])) {
    $base64Image = $_POST['selfie'];
    $base64Image = preg_replace('/^data:image\/[a-z]+;base64,/', '', $base64Image);
    $imageData = base64_decode($base64Image);
    $uploadFolder = 'uploads/';
    if (!file_exists($uploadFolder) && !is_dir($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }
    $filename = $uploadFolder . 'image_' . time() . '.jpg';
    if (file_put_contents($filename, $imageData)) {
        echo json_encode(['status' => 1]);
    } else {
        echo json_encode(['status' => 0]);
    }
} else {
    echo json_encode(['status' => 'No data received']);
}
?>
