
<?php 
session_start();
error_reporting(E_ALL);
include "koneksi.php"; 


if(isset($_POST['login'])){


    $user = $_POST['username'];
    $pass = ($_POST['password']);

    mysqlii_query

    //baru cek sini
  
    $query = "SELECT * from admin where username='$user'";    
    $hasil = mysqli_query($connect,$connect, $query);  
    $num_rows = mysqli_num_rows($hasil);  

    if($num_rows > 0){

      while ($data = mysqli_fetch_assoc(hasil)) {

        $password=$data ['password']; 

        if (md5($pass)===$password) 
        {
          if ($username=='admin') {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $password;
          }
        }
        # code...
      }

        
          
          ?><script language="JavaScript">alert('Selamat datang admin'); 
            document.location='index.php'</script>
          }
          else{
  ?><script language="JavaScript">alert('Data tidak lengkap! Ulangi..'); 
  document.location="login1.php";</script>

}    
?>    
