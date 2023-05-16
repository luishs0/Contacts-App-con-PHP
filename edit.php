<?php
  require "database.php";

  if (empty($_SESSION["user"])) {
      header("Location: index.php");
      return;
  };

  $contact_id=$_GET["id"];
  $stmt=$conn->query("SELECT * FROM contacts WHERE id=$contact_id");
  $contactArray=$stmt->fetchAll(PDO::FETCH_ASSOC);
  $contact=$contactArray[0];
  //var_dump($contact_id);


  if (isset($_POST) && !empty($_POST)) {
    $newName = $_POST["name"];
    $newPhoneNumber = $_POST["phone_number"];

    $stmt = $conn->prepare("UPDATE contacts SET name = :newName, phone_number = :newPhoneNumber WHERE id = :contact_id");
    $stmt->bindParam(':newName', $newName);
    $stmt->bindParam(':newPhoneNumber', $newPhoneNumber);
    $stmt->bindParam(':contact_id', $contact_id);
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
              <form method="POST" action="edit.php?id=<?php echo "$contact_id"; ?>">
                <div class="mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
    
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus value="<?php echo $contact["name"] ?>">
                  </div>
                </div>
    
                <div class="mb-3 row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>
    
                  <div class="col-md-6">
                    <input id="phone_number" type="tel" class="form-control" value="<?php echo $contact["phone_number"] ?>" name="phone_number" autocomplete="phone_number" autofocus>
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