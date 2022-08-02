<?php
 // require ('verify.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>login Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="d-flex min-vh-100 justify-content-center align-items-center">
      <div class="shadow-sm mx-2 border rounded p-5">
        <h3>Welcome</h3>
        <form action="verify.php" method="POST">
          <div class="form-group">
            <label  class="mt-3 mb-1 text-muted">
            Firstname
            </label>
            <input  type="text" name="firstname" class="form-control" />
            <label  class="mt-3 mb-1 text-muted">
             Lastname
            </label>
            <input  type="text" name="lastname" class="form-control" />
            <label  class="mt-3 mb-1 text-muted">
             Email
            </label>
            <input  type="email" name="email" class="form-control" />
            <label  class="mt-3 mb-1 text-muted">
             Password
            </label>
            <input  type="text" name="password" class="form-control" />
            <label  class="mt-3 mb-1 text-muted">
            <label  class="mt-3 mb-1 text-muted">
             Phone
            </label>
            <input type="text" name="phone" class="form-control" />
            <button name="submit" type="submit" class="btn btn-success mt-2 w-100" >
              Continue
            </button>  
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
