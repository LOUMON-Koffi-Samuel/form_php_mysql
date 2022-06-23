<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="card text-dark bg-light mt-5 m-auto" style="max-width: 40rem;">
        <div class="card-header text-center">
            <h1 class="text-primary">Inscription</h1>
        </div>
        <div class="card-body">
        <form action="#" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email_inscription" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password_inscription">
            </div>
            <button type="submit" class="btn btn-primary p-2">S'inscrire</button>
        </form>
        </div>
    </div>

    <?php
     $servername = "localhost";
     $username = "root";
     $password = "root";
     $base = "projet";

     try {
         $conn = new PDO("mysql:host=$servername;dbname=$base",$username, $password);
         // set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         echo "Connected successfully";
       } catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
     }

    if(isset($_POST['email_inscription']) && isset($_POST['password_inscription'])){
        $email = $_POST['email_inscription'];
        $password = $_POST['password_inscription'];
        $sql = "INSERT INTO users (email, password)
        VALUES ($email, $password)";
        
        try{
            $conn->exec($sql);
        echo "New record created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>