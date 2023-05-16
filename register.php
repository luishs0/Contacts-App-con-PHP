<?php
  require "database.php";

  $error = "";
    if ($_POST && !empty($_POST)) {
    
        $newUser = [
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
        ];

        if (empty($newUser["name"]) || empty($newUser["email"]) || empty($_POST["password"]) ) {
            $error = "All fields must be completed";
        } else if (strpos($newUser["email"], "@") == false) {
            $error = "The email format is not correct";
        } else {

            $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $statement->bindParam(":email", $newUser["email"]);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                $error = "This email is taken.";
            } else {
                $conn
                ->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)")
                ->execute([
                    ":name" => $newUser["name"],
                    ":email" => $newUser["email"],
                    ":password" => $newUser["password"],
                ]);

                $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $statement->bindParam(":email", $newUser["email"]);
                $statement->execute();

                $user = $statement->fetch(PDO::FETCH_ASSOC);
                
                session_start();
                $_SESSION["user"] = $user;

                header("Location: home.php");
            }   
        }
    }
?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts App | Register</title>

    <!-- Bootstrap -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css"
    integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <script
    defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>

  </head>
  <body>
    <main>
        <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                
                    <p class="text-danger">

                    </p>
                <form method="POST" action="register.php">
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
            
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus>
                        </div>
                    </div>
            
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
            
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" autocomplete="email" autofocus>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
            
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" autocomplete="password" autofocus>
                        </div>
                    </div>
        
                    <div class="mb-3 row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    <p>
                        <?php 
                            if (!empty($error)) {
                                echo "$error";
                            }  
                        ?>
                    </p>

                    <div class="mb-3 row text-end me-3">
                        <a href="login.php">I have an account</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </main>

<?php require "partials/footer.php"; ?>