<?php
    require_once 'koneksi.php';
    if(!$conn){
        die("KONEKSI GAGAL: ".mysqli_connect_error());
    } else {
       // echo("KONEKSI SUKSES");
    } 


    //FILTER DATA MHS PER NIM (id)
    /*$id = $_GET['id'];
    */

    //FILTER DATA MHS PER JENIS KELAMIN (Jenis Kelamin)
    $jk = $_GET['jk'];
    

    //STRING UNTUK QUERY
    /*$sql = "SELECT * FROM tmahasiswa
            WHERE NIM = $id
            ORDER BY nim ASC";
    */

    //STRING UNTUK QUERY
    $sql = "SELECT * FROM tmahasiswa
            WHERE JenisKelamin = '$jk'
            ORDER BY nim ASC";
    
    //STRING UNTUK QUERY
    /*$sql = "SELECT * FROM tmahasiswa ORDER BY nim ASC"; 
    */

    //STRING UNTUK QUERY
    /*$sql = "SELECT * FROM tmahasiswa
            WHERE KotaAsal = 'MALANG'";
    */

    //STRING UNTUK QUERY
    /*$sql = "SELECT `tdosen`.`NamaDosen` , `tmatakuliah`.`MataKuliah`
            FROM `tdosen` , `tmatakuliah`";
    */

    //JALANKAN QUERY
    $r = mysqli_query($conn, $sql);

    //SIMPAN KE ARRAY
    $result = array();

    while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "nim"=>$row['NIM'],
            "nama"=>$row['NamaLengkap'],
            "Jenis_kelamin"=>$row['JenisKelamin'],
            "kelas"=>$row['KELAS']
        ));
    
    /*while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "nama_dosen"=>$row['NamaDosen'],
            "mata_kuliah"=>$row['MataKuliah']
        ));
    */
    }
    echo json_encode($result);
    mysqli_close($conn);
?>