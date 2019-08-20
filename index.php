<?php
require "libno6.php";
$datab = query("SELECT name.name, work.name, category.salary, name.id FROM name, work, category where name.id_work = work.id && work.id_salary = category.id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penggajian</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style5.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="index.php" class="gambar">data pegawai</a>
            <h1 name="jud" class="juju">DATA PEGAWAI</h1>
        </div>
        <div class="content">
            <button class="tambah">ADD</button>
            <div class="kolom-tambah">
                <h1 class="tambah-data">ADD DATA</h1>
                <p class="tutup-tambah">X</p>
                <form action="proses-pendaftaran6.php" method="post">
                    <input type="text" name="nama" placeholder="Name ...">
                    <select name="work">
                        <?php
                            $da = query("SELECT work.id, work.name FROM work");
                            foreach($da as $row):?>
                            <option><?php echo "$row[0] $row[1]" ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="salary">
                    <?php
                            $da = query("SELECT category.id FROM category");
                            foreach($da as $row):?>
                            <option><?php echo "$row[0]" ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="daftar-kirim" class="tombol-kirim">ADD</button>
                </form>
            </div>
            <form action="index.php" method="post">
                <table class="table table-bordered center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Work</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>                    
                    <?php                                         
                    foreach($datab as $row) :?>
                        <tr>
                            <td name="<?php echo $row[0] ?>"><?php echo $row[0];?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo "Rp.". number_format($row[2],0,',','.'); ?></td>
                            <td>
                                <a class="hapus1" href='<?php echo "index.php?id1=".$row[3]?>'>Hapus</a>                  
                                <a class="edit1" href='<?php echo "index.php?ide=".$row[3]?>&nama=<?php echo $row[0]; ?>&work=<?php echo $row[1] ?>&salary=<?php echo $row[2] ?>'>Edit</a>
                            </td>                    
                        </tr>				                        
                    <?php endforeach;                                         
                    ?>    
                    <?php
                    if( isset($_GET['id1']) ){                        
                        // ambil id dari query string
                        $id = $_GET['id1'];                        
                        // buat query hapus
                        $sql = "DELETE FROM name WHERE id=$id";
                        $query = mysqli_query($conn, $sql);                        
                        // apakah query hapus berhasil?
                        if( $query ){
                            echo "
                            <div class='berhasil-dihapus'>
                                <div class='box-close'>
                                    <span class='close'>X</span>
                                </div>
                                <div class='box-content'>
                                    <img src='img/ceklis.png' alt='berhasil'>
                                    <p>Data telah berhasil dihapus</p>
                                </div>
                            </div>
                            <script>
                                const close = document.querySelector('.close');
                                close.addEventListener('mouseover', function () {
                                    close.style.cursor = 'pointer';
                                });                        
                                close.addEventListener('click', function () {
                                    document.location.href = 'index.php';
                                });
                            </script>
                                ";
                        } else {
                            die("gagal menghapus...");
                        }                        
                    } 
                    ?>
                </tbody>
                </table>
            </form>
            <?php if(isset($_GET['ide'])){ ?>
            <div class="kolom-edit1">
                    <form action="proses-edit.php" method="POST">
                        <h1 class="edit1-data">EDIT DATA</h1>
                        <p class="tutup-edit1">X</p>
                        <input type="hidden" name="id" value="<?php echo $_GET['ide'] ?>">
                        <label for="namaa">Nama</label>
                        <input type="text" id="namaa" name="namaa" value="<?php echo $_GET['nama'] ?>">
                        <label for="worka">Work</label>
                        <input type="text" id="worka" name="worka" value="<?php echo $_GET['work'] ?>">
                        <label for="salarya">Salary</label>
                        <input type="text" id="salarya" name="salarya" value="<?php echo number_format($_GET['salary'],0,',','.'); ?>" placeholder="Salary ...">
                        <button type="submit" class="tombol-kirim-edit1" name="btn_ubah" >EDIT</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="js/script2.js"></script>
</body>
</html>