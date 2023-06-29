<?php
    /*
    require_once 'koneksi.php';
    if(!$conn){
        die("KONEKSI GAGAL: ".mysqli_connect_error());
    } else {
       echo("KONEKSI SUKSES");
    } 
    */

    // Endpoint untuk memperbarui data nama dosen
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $kodex = $data['kode'];
        $namaDosenx = $data['nama_dosen'];

        $sql = "UPDATE tdosen SET NamaDosen = '$namaDosenx' WHERE KdDosen = '$kodex'";

        if (mysqli_query($conn, $sql)) {
            $response = array('status' => 'success', 'message' => 'Data nama dosen berhasil diperbarui');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Gagal memperbarui data nama dosen: ' . mysqli_error($conn));
            echo json_encode($response);
        }
    }

    // Menutup koneksi
    mysqli_close($conn);


?>