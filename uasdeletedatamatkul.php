<?php
    require_once 'koneksi.php';
    if(!$conn){
        die("KONEKSI GAGAL: ".mysqli_connect_error());
    } else {
       // echo("KONEKSI SUKSES");
    } 
    

    // Endpoint untuk menghapus data mata kuliah
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $data = json_decode(file_get_contents("php://input"), true);
        $kodex = $data['kode'];

        $sql = "DELETE FROM tmatakuliah WHERE KdMataKuliah = '$kodex'";

        if (mysqli_query($conn, $sql)) {
            $response = array('status' => 'success', 'message' => 'Data mata kuliah berhasil dihapus');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Gagal menghapus data mata kuliah: ' . mysqli_error($conn));
            echo json_encode($response);
        }
    }

    // Menutup koneksi
    mysqli_close($conn);

?>