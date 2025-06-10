<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="LoginUser.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" />
    <title>Daftar Akun</title>
</head>

<body>
    <div class="container">
        <!-- Panel Kiri -->
        <aside aria-label="Nucleus branding and testimonial" class="left-panel">
            <div class="left-image-wrapper">
                <img alt="SMK Image" src="smkeditt.png" />
            </div>
            <div class="logo">
                <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24">
                    <circle cx="5" cy="5" r="3.5"></circle>
                    <circle cx="19" cy="5" r="3.5"></circle>
                    <circle cx="5" cy="19" r="3.5"></circle>
                    <circle cx="19" cy="19" r="3.5"></circle>
                </svg>
                SMKN 6 SURAKARTA
            </div>
            <div class="left-content">
                <p class="quote">
                    “Simply all <span> tools that my team and I need.</span>”
                </p>
                <p class="author-name">Tiarasyahrani</p>
                <p class="author-title">Director of Digital Marketing Technology</p>
            </div>
        </aside>

        <main class="right-panel">
            <form method="POST" action="proses_register.php">
                <h1>Daftar Akun</h1>
                <p class="subtitle">Silakan buat akun sesuai peran yang ditentukan.</p>

                <label for="username">Username</label>
                <input id="username" type="text" name="username" required placeholder="Masukkan Username" />

                <label for="password" style="margin-top: 16px;">Kata Sandi</label>
                <input id="password" type="password" name="password" required placeholder="Masukkan Kata Sandi" />  
                
                <label for="email" style="margin-top: 16px;">Emal</label>
                <input id="email" type="email" name="email" required placeholder="Masukkan Email" />  

                <label for="role" style="margin-top: 16px;">Peran</label>
                <select id="role" name="role" required style="width: 100%; padding: 8px 12px; font-size: 14px; border: 1.5px solid #ddd; border-radius: 6px;">
                    <option value="">Pilih peran</option>
                    <option value="admin">Admin</option>
                    <option value="siswa">Siswa</option>
                </select>

                <button type="submit" class="login-btn" style="margin-top: 20px;">Daftar</button>
                <p class="signup-text">Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
            </form>
        </main>
    </div>
</body>

</html>