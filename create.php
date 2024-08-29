<?php 

  $name = "";
  $email = "";
  $phone = "";
  $address = "";

  $errorMessage = "";
  $successMessage = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
      if ( empty($name) || empty($email) || empty($phone) || empty($address) ) {
        $errorMessage = "All the fields are required";
        break;
      }

      // Add code here to insert data into your database

      $name = "";
      $email = "";
      $phone = "";
      $address = "";

      $successMessage = "Client added correctly";

    } while (false);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>myshop</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
    <h2>New client</h2>

    <?php 
      if ( !empty($errorMessage) ) {
        echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
        ";
      }
    ?>

    <form class="mt-4" method="POST">
        <div class="row mb-3">
            <label class="col-sm-1 col-form-label">Name:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($name); ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-1 col-form-label">Email:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="email" value="<?= htmlspecialchars($email); ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-1 col-form-label">Phone:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($phone); ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-1 col-form-label">Address:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($address); ?>">
            </div>
        </div>

        <?php 
          if ( !empty($successMessage) ) {
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>
            ";
          }
        ?>

        <div class="row mb-2">
            <div class="offset-sm-1 col-sm-2 d-grid">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-2 d-grid">
              <a class="btn btn-outline-primary" href="/myshop/index.php" role="button">Cancel</a>
            </div>
        </div>
    </form>
  </div>
</body>
</html>
