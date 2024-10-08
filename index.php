
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
      <h2>CRUD APP PHP & MYSQL</h2>
      <p>List of Clients.</p>

      <a class="btn btn-primary" href="create.php" role="button">New client</a>
      <br>

      <table class="table mt-2">
        <thead>
          <tr>
            <th>ID:</th>
            <th>Name:</th>
            <th>Email:</th>
            <th>Phone:</th>
            <th>Address:</th>
            <th>Created at:</th>
            <th>Action:</th>
          </tr>
        </thead>

        <tbody>
         
 <?php 

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "myshop";

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection 
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // Read all rows from the database table 
            $sql = "SELECT * FROM clients";
            $result = $conn->query($sql);

            if (!$result) {
              die("Invalid query: " . $conn->error);
            }

            // Read data of each row 
            while($row = $result->fetch_assoc()) {
              echo "
               <tr>
                  <td>$row[id]</td>
                  <td>$row[name]</td>
                  <td>$row[email]</td>
                  <td>$row[phone]</td>
                  <td>$row[address]</td>
                  <td>$row[created_at]</td>
                  <td>
                    <a class='btn btn-primary btn-sm' href='/update.php?id=$row[id]'>Update</a>
                    <a class='btn btn-danger btn-sm' href='/delete.php?id=$row[id]'>Delete</a>
                  </td>
                </tr>
              ";
            }
            $conn->close();

            
          ?>
        </tbody>
      </table>
  </div>
  </body>
</html>

