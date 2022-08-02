<?php
  require ('otp_verify.php')
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Otp verification</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="d-flex min-vh-100 justify-content-center align-items-center">
      <div class="shadow-sm mx-2 border rounded p-5">
        <h3>Confirm it's you</h3>
        <form action="otp.php" method="POST">
          <div class="form-group">
            <label for="uinput" class="mt-3 mb-1 text-muted">
              An otp code has been sent to your phone
            </label>
            <input id="uinput" type="text" name="otp" class="form-control" />
            <button name="submit" type="submit" class="btn btn-success mt-2 w-100" >
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
```
