<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php
    
    include_once("config_login.php");
     $usr = $_POST['username'];
    $pass = $_POST['password'];
    $hashed_pass=hash('sha256',$pass);

    try {
        $pdo = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
   
    
// $sql="select * from users where (username=? or email=?) and password=?";
$sql = "select * from users where (username=? or email=?) and password= ? and active='SI'";


// Use de sentencias prepared

// Uso de POO- Programacion Orientada a Objeto   nombre_objeto->propiedad/metodo

$stmt= $pdo->prepare($sql);

$stmt ->execute([$usr,$usr,$hashed_pass]);

$row=$stmt ->fetch(PDO::FETCH_ASSOC);

//VALIDAR CONTRASEÑA Y USUARIO
if(!$row){
    // no ingresa

    echo"Los datos ingreados no son validos !";

}else
{
    //ingresando
    session_start();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $_SESSION['time'] = date('H:i:s');
        $_SESSION['username'] = $usr;
        $_SESSION['logueado'] = true;
        header("location:welcome.php");  //crear una web .php
}
    //Check if username exists
//select * from users where (username='maria' or email='maria@bigdata.com') and password=SHA2('maria123456', 256);

?>
</body>

</html>