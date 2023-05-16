<?php
require "database.php";

session_start();

if (empty($_SESSION["user"])) {
    header("Location: index.php");
    return;
};

if ($check=="true") {
    $contacts = $conn->query("SELECT * FROM contacts");
};
?>

  <?php require "partials/header.php" ?>

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
                                <a href="delete.php?id=<?php echo $contact["id"]; ?>" class="btn btn-danger mb-2">Delete Contact</a>
                            </div>
                            </div>
                        </div>

                    <?php } ?>

                <?php } ?>

            </div>
        </div>
    </main>
 <?php require "partials/footer.php" ?>
