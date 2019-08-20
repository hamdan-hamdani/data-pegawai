<?php     
  require("libno6.php");
                    if (isset($_POST['btn_ubah'])){
                        $ed = $_POST['id'];
                        $namaa = $_POST['namaa'];
                        $worka = $_POST['worka'];
                        $salarya = $_POST['salarya'];

                        if (!empty($ed) && !empty($namaa) && !empty($worka) && !empty($salarya)){  
                            $sql_update = "UPDATE name SET name = '$namaa', id_work = $worka, id_salary = $salarya WHERE name.id = $ed";                            
                            $query = mysqli_query($conn, $sql_update);
                            if($query){                                    
                                header('location: index.php');                                    
                            }else{
                                echo "Silahkan masukan kode 1 pada field work dan salary untuk Frontend Dev<br>atau masukan kode 2 untuk Backend Dev";
                            }
                        }else {
                            echo "Data ada yang belum di isi";
                        }
                    }              
                ?>