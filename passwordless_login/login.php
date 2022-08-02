<?php
  require ('process.php')
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
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="uinput" class="mt-3 mb-1 text-muted">
              Kindly, enter your mobile number to proceed.
            </label>
            <input id="uinput" type="text" name="phone" class="form-control" />
            <button name="submit" type="submit" class="btn btn-success mt-2 w-100" >
              Continue
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
