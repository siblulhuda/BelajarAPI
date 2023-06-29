<?php
    require_once 'koneksi.php';
    if(!$conn){
        die("KONEKSI GAGAL: ".mysqli_connect_error());
    } else {
       // echo("KONEKSI SUKSES");
    } 


    //FILTER DATA MHS PER NIM (id)
    $kotaasal = $_GET['ka'];
    

    //STRING UNTUK QUERY
    $sql = "SELECT * FROM tmahasiswa
            WHERE KotaAsal = '$kotaasal'
            ORDER BY nim ASC";
    

    //STRING UNTUK QUERY
    /* $sql = "SELECT * FROM tmahasiswa ORDER BY nim ASC"; 
    */

    //STRING UNTUK QUERY
    /*$sql = "SELECT * FROM tmahasiswa
            WHERE KotaAsal = 'MALANG'";
    */

    //JALANKAN QUERY
    $r = mysqli_query($conn, $sql);

    //SIMPAN KE ARRAY
    $result = array();

    while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "nim"=>$row['NIM'],
            "nama"=>$row['NamaLengkap'],
            "kota"=>$row['KotaAsal'],
            "kelas"=>$row['KELAS']
        ));
    }
    echo json_encode($result);
    mysqli_close($conn);
?>