<!DOCTYPE html>
<html lang="en">
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <!-- Bootstrap CSS -->
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
      />

      <!-- own made css -->
      <link rel="stylesheet" href="style.css">

      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>



      <title>CRUD</title>
    </head>
    <body>
      <!-- navigation bar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CRUD</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <?php
      require_once 'formData.php';
      if(isset($_SESSION['message'])){
        echo "<div class='alert alert-".$_SESSION['msgType']."  role='alert'>".$_SESSION['message']."
      </div>";
      }
      unset($_SESSION['message']);
      ?>

      
      <!-- Form -->
      <form action="formData.php" method="POST" autocomplete="off">
        <input type="hidden" name='id' value=<?php echo $id; ?>>
        <div class="container justify-content-center w-50 p-3 my-4">
          <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="Enter your name"
              value="<?php echo $name?>"
            />
          </div>
          <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="Enter your email"
              value="<?php echo $email;?>"
            />
          </div>
         <?php 
         if($update){
           echo " <button type='submit' name='edit' class='btn btn-dark'>
           Update
         </button>";
         }
         else{
           echo" <button type='submit' name='submit' class='btn btn-dark'>
           Submit
         </button>";
         }
         ?>
        </div>
      </form>


      <!-- Table for displaying data -->
      <div class="tcontainer container justify-content-center w-50 p-3">
      <table class="table table-dark table-hover my-3 " id='myTable'>
        <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th >Actions</th>
        
        </tr>
        </thead>
        <tbody>
      <?php 
      require_once 'formData.php';
      $result=mysqli_query($con,'SELECT * FROM `crud`;');
      
      while($rows=mysqli_fetch_assoc($result)){
        echo "<tr>
          <td>".$rows['Name']."</td>
          <td>".$rows['Email']."</td>
          <td><a href=formData.php?delete=".$rows['Id']." class='btn btn-light'>Delete</a>  <a href=index.php?update=".$rows['Id']." class='btn btn-light'>Update</a></td
        </tr>";
       }
      
      ?>
      </tbody>
      </table>
      </div>
      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    function reload(){
      console.log('button cliced');
    }
  </script>
    </body>
  </html>
</html>
