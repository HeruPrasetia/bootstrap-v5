<?php
date_default_timezone_set('Asia/Jakarta');
$server = "localhost";
$user   = "root";
$pass   = "naylatools";
$db     = "dbatro_real";

$con    = mysqli_connect($server, $user, $pass, $db);
if (mysqli_connect_errno($con)) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
$act = $_REQUEST['act'];
switch ($act) {
    case 'input':
        $judul = $_POST['nama'];
        // $file = $_FILES['file'];
        // $namafile = $file['name'];
        // $hoby = $_POST['hobby'];
        // $jml = count($hoby);
        $response = ["status" => "berhasil", "pesan" => "Judul adalah $judul "];
        print json_encode($response);
    break;

    case 'data':
        $result = mysqli_query($con, "SELECT nama_barang, id_barang, ukuran_barang, keterangan_barang FROM barang");
        $rows = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $rows[] = $row;
        }
        mysqli_close($con);
        $response = [
            "status" => "berhasil",
            "data" =>  $rows
        ];
        print json_encode($response); 
    break;

    default:
        $response = ["status" => "gagal", "pesan" => "Tidak ada Perintah $act"];
        print json_encode($response);
    break;
}
