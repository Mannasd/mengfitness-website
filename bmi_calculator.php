<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $activity = $_POST['activity'];

    // Menghitung BMI
    $height_in_meters = $height / 100;
    $bmi = $weight / ($height_in_meters * $height_in_meters);

    // Menghitung Kalori Harian
    if ($gender == 'male') {
        $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
    } else {
        $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
    }

    switch ($activity) {
        case 'sedentary':
            $calories = $bmr * 1.2;
            break;
        case 'lightly_active':
            $calories = $bmr * 1.375;
            break;
        case 'moderately_active':
            $calories = $bmr * 1.55;
            break;
        case 'very_active':
            $calories = $bmr * 1.725;
            break;
        case 'extra_active':
            $calories = $bmr * 1.9;
            break;
        default:
            $calories = $bmr;
            break;
    }

    // Menyimpan hasil ke dalam sesi
    $_SESSION['bmi'] = $bmi;
    $_SESSION['calories'] = $calories;

    // Redirect ke halaman rekomendasi
    header("Location: recommendations.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator BMI dan Kalori</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Mengfitnes" class="logo-img">
            <span>Mengfitnes</span>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Hubungi Kami</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="calculator">
            <h1>Calculator BMI dan Kalori Harian</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="weight">Berat Badan (kg):</label>
                <input type="number" id="weight" name="weight" required>

                <label for="height">Tinggi Badan (cm):</label>
                <input type="number" id="height" name="height" required>

                <label for="age">Usia:</label>
                <input type="number" id="age" name="age" required>

                <label for="gender">Jenis Kelamin:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>

                <label for="activity">Tingkat Aktivitas:</label>
                <select id="activity" name="activity" required>
                    <option value="sedentary">Sedentari</option>
                    <option value="lightly_active">Sedikit Aktif</option>
                    <option value="moderately_active">Cukup Aktif</option>
                    <option value="very_active">Sangat Aktif</option>
                    <option value="extra_active">Sangat Aktif Sekali</option>
                </select>

                <button type="submit">Hitung</button>
            </form>
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Hubungi Kami</h3>
                <p>Email: info@fitnessrecommendation.com</p>
                <p>Telepon: 123-456-7890</p>
            </div>
            <div class="footer-section">
                <h3>Berlangganan Newsletter Kami</h3>
                <form action="#" method="post">
                    <input type="email" name="email" placeholder="Masukkan email Anda">
                    <button type="submit">Berlangganan</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Mengfitnes. Hak cipta dilindungi.
        </div>
    </footer>
</body>

</html>
