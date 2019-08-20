<?php
    //  require "libno6.php";
    $conn = mysqli_connect("localhost","root","","penggajian_db");
                    if (isset($_POST['daftar-kirim'])){
                        $name = $_POST['nama'];
                        $work = $_POST['work'];
                        $salary = $_POST['salary'];
                        $sql = "INSERT INTO name(name, id_work, id_salary) VALUE ('$name','$work','$salary') ";
                        $query = mysqli_query($conn, $sql);                            
                            // apakah query hapus berhasil?
                            if( $query ){
                                header('Location: index.php');
                                echo "yayay";
                            }else{
                                echo "Silahkan masukan kode 1 untuk Frontend Dev<br>2 untuk Backend Dev";
                            }
                    }
                ?>