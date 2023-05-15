<?php
  require "database.php";

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $newContact = [
            "name" => $_POST["name"],
            "phone_number" => $_POST["phone_number"]
        ];

        $stmt = $conn->prepare("INSERT INTO contacts (name, phone_number) VALUES (:name, :phone_number)");
        $stmt->bindParam(':name', $newContact["name"]);
        $stmt->bindParam(':phone_number', $newContact["phone_number"]);
        $stmt->execute();

        header("Location: home.php");
    }
?>

 <?php require "partials/header.php" ?>

  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Add New Contact</div>
            <div class="card-body">
              
                <p class="text-danger">

                </p>
              <form method="POST" action="add.php">
                <div class="mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
    
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
    
                  <div class="col-md-6">
                    <input id="phone_number" type="tel" class="form-control" name="phone_number" autocomplete="phone_number" autofocus>
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require "partials/footer.php" ?>
