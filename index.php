<?php

require "database.php";

if ($check=="true") {
    $contacts = $conn->query("SELECT * FROM contacts");
};





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

  <!-- Static Content -->
  <link rel="stylesheet" href="./static/css/index.css" />

  <title>Contacts App</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="#">
        <img class="mr-2" style="width: 2rem" src="https://lh3.googleusercontent.com/5xkPj76K_z91n78hmD1xf-U293ItzLnJsreSDUPvBsnh0UCMFRSiS7y4nP7IfENnePP1Lo2RUhlO1extIsv4pFMjOnp8x40wM3E9y1ocpj1GkAyGaJtVzlqHA9YgS3XveAwP1vlh=w1200-h630-p-k-no-nu" />
        ContactsApp
      </a>

      
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <main>
        <div class="container pt-4 p-3">
            <div class="row">
                
                <?php if ($contacts->rowCount()==0) { ?>
                    <div class="col-md-4 mx-auto">
                        <div class="card card-body text-center">
                            <?php 
                                if ($check=="true") {
                                        
                                    echo "<p>No contacts saved yet</p>";
                                    echo "<a href='add.php'>Add One!</a>";

                                } else {
                                    echo "Could not connect to database: $database";
                                }
                            ?>
                        </div>
                    </div>

                <?php } else { ?>


                    <?php foreach ($contacts as $key => $contact) { ?>

                        <div class="col-md-4 mb-3">
                            <div class="card text-center">
                            <div class="card-body">
                                <h3 class="card-title text-capitalize"> <?php echo $contact["name"]; ?> </h3>
                                <p class="m-2"> <?php echo $contact["phone_number"]; ?> </p>
                                <a href="edit.php?id=<?php echo $contact["id"]; ?>" class="btn btn-secondary mb-2">Edit Contact</a>
                            </div>
                            </div>
                        </div>

                    <?php } ?>

                <?php } ?>

            </div>
        </div>
    </main>
</body>
</html>
