
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="LoginUser.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" ; />

  <title>Login Users</title>
</head>

<body>
  <div class="container">
    <aside aria-label="Nucleus branding and testimonial" class="left-panel">
      <div class="left-image-wrapper">
        <img alt="" height="720" src="smkeditt.png" width="480" />
      </div>
      <div aria-label="Smk logo" class="logo">
        <svg aria-hidden="true" focusable="false" viewbox="0 0 24 24">
          <circle cx="5" cy="5" r="3.5"></circle>
          <circle cx="19" cy="5" r="3.5"></circle>
          <circle cx="5" cy="19" r="3.5"></circle>
          <circle cx="19" cy="19" r="3.5"></circle>
        </svg>
        SMKN 6 SURAKARTA
      </div>
    </aside>
    <main aria-label="Login form" class="right-panel">
      <form method="POST" action="login.php">
        <h1>Selamat Datang</h1>
        <p class="subtitle">
          Login menggunakan NISN (untuk siswa) atau Username (untuk admin).
        </p>

        <label for="username"> NISN / Username </label>
        <input id="username" type="text" name="username" required placeholder="Masukkan NISN atau Username" />

        <label for="password" style="margin-top: 16px"> Kata sandi </label>
        <input id="password" name="password" type="password" required placeholder="Masukkan Kata Sandi" />

        
        <span class="forgot-password">Hubungi admin untuk reset kata sandi</span>

        <div class="remember-container">
          <span> Ingat detail masuk </span>
          <label aria-label="Remember sign in details toggle" class="switch">
            <input checked="" type="checkbox" />
            <span class="slider"> </span>
          </label>
        </div>
        <button class="login-btn" type="submit">Masuk</button>
        <p class="signup-text">Akun dibuat pihak sekolah</p>
      </form>
    </main>
  </div>
</body>

</html>