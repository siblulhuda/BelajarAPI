<?php
    require_once 'koneksi.php';
    if(!$conn){
        die("KONEKSI GAGAL: ".mysqli_connect_error());
    } else {
       // echo("KONEKSI SUKSES");
    } 
    

    // Endpoint untuk menambahkan data mata kuliah
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $KdMataKuliahx = $data['kdmatkul'];
        $MataKuliahy = $data['nmmatkul'];

        $sql = "INSERT INTO tmatakuliah (KdMataKuliah, MataKuliah) VALUES ('$KdMataKuliahx', '$MataKuliahy')";

    if (mysqli_query($conn, $sql)) {
        $response = array('status' => 'success', 'message' => 'Data mata kuliah berhasil ditambahkan');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Gagal menambahkan data mata kuliah: ' . mysqli_error($conn));
        echo json_encode($response);
    }
}

    // Menutup koneksi
    mysqli_close($conn);

?>