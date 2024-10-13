<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url("assets/font.css") ?>">
  <title>Sueb Login</title>

  <style>
  body {
    margin: 0;
    padding: 0;
    line-height: 1;
    box-sizing: border-box;
  }

  .wrapper {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #86efac, #10b981, #047857);
  }

  .container {
    background-color: #022c22;
    padding: 24px 16px;
    border-radius: 8px;
    margin-top: -32px;
    width: 450px;
    box-shadow: 4px 4px 36px rgba(0, 0, 0, .4);
  }

  h2 {
    font-size: 36px;
    font-weight: bold;
    color: white;
    margin: 0;
    text-align: center;
    padding-bottom: 24px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    gap: 4px;
    color: #fff;
    margin-bottom: 20px;
    padding: 0px 20px;
  }

  label {
    font-size: 14px;
    color: #6EE7B7;
  }

  .form-group input {
    outline: none;
    border: 1px solid #6EE7B7;
    padding: 12px 16px;
    border-radius: 6px;
    font-size: 16px;
    background-color: #022c22;
    color: #fff;
  }

  .form-group input::placeholder {
    color: #aaa;
  }

  .btn {
    padding: 16px 20px 12px;
    display: flex;
  }

  .btn button {
    width: 100%;
    background-color: #10B981;
    outline: none;
    border: none;
    padding: 12px 0px;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 500;
    color: white;
    cursor: pointer;
  }

  .alert {
    padding: 0px 20px;
  }

  .alert span {
    color: #f43f5e;
    font-size: 12px;
  }
  </style>

</head>

<body>


  <div class="wrapper">
    <div class="container">
      <h2>Sueb Kost</h2>
      <form action="<?= base_url('auth/login') ?>" method="post">

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" autocomplete="off" required placeholder="input username">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" autocomplete="off" required placeholder="input password">
        </div>

        <?php if (isset($error)) { ?>
        <div class="alert">
          <span>*Username atau password salah !!!</span>
        </div>
        <?php } ?>

        <div class="btn">
          <button type="submit" value="Login">Login</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>