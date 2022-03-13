<?php
$target_dir = 'uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

$nama = $_POST['nama'];
$age = $_POST['age'];

echo $nama;
echo '<br>';
echo $age;
echo '<br>';
echo $_FILES['fileToUpload']['name'];
echo '<br>';

$status = array();

if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
  $status['status'] = 1;
  $status['description'] = 'upload success';
} else {
  $status['status'] = 0;
  $status['description'] = 'upload failed';
}
echo json_encode($status);
