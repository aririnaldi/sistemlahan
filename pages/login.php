<?php
if(isset($_POST['submit'])){
    $continue = false;
    $user = addslashes($_POST['username']);
    $pass = addslashes($_POST['password']);

    $query = "SELECT * from admin where username = '". $user ."'";
    $hasil = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($hasil);

    if($num_rows > 0){
        $data = mysqli_fetch_assoc($hasil);
        $password = $data ['password'];

        if ($pass === $password){
            $continue = true;
        }
    }

    if ($continue) {
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $password;

        echo "
    		<script>
    			document.location='admin.php';
    			alert('Login berhasil..');
    		</script>
    	";
        die();
    }else{
        echo "
    		<script>
    			alert('Login gagal..');
    		</script>
    	";
    }
}

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	echo "
		<script>
			document.location='admin.php';
		</script>
	";
}
?>


<br><br><br>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="login-box">
            <div class="card">
                <div class="header text-center">
                    <h1>Login Admin</h1>
                    <p>Penetuan Lokasi Lahan Tanaman Rimpang</p>
                </div>
                <div class="body">
                    <form method="post" action="?page=login">
                        <div class="msg"></div>
                        <div class="input-group">
                            <div class="form-line">
                                <label for="username" class="control-label hide">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <label for="password" class="control-label hide">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-offset-3 col-xs-6 p-t-15">
                                <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit">Masuk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
