<?php
session_start();
include 'db.php';

$bmi = $_SESSION['bmi'];
$calories = $_SESSION['calories'];

// Menentukan kategori BMI
if ($bmi < 18.5) {
    $bmi_category = 'Underweight';
} elseif ($bmi >= 18.5 && $bmi < 24.9) {
    $bmi_category = 'Normal';
} elseif ($bmi >= 25 && $bmi < 29.9) {
    $bmi_category = 'Overweight';
} else {
    $bmi_category = 'Obese';
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Nutrisi dan Latihan</title>
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
        <section class="results">
            <h1>Rekomendasi Kalori Harian</h1>
            <p><strong>BMI Anda:</strong> <?php echo round($bmi, 2); ?></p>
            <p><strong>Kategori BMI Anda:</strong> <?php echo $bmi_category; ?></p>
            <p><strong>Kebutuhan Kalori Harian Anda:</strong> <?php echo round($calories, 2); ?> kalori</p>
        </section>

        <section class="results">
            <h2>Rekomendasi Nutrisi</h2>
            <?php
            // Tambahkan rekomendasi nutrisi berdasarkan kategori BMI di sini
            switch ($bmi_category) {
                case 'Underweight':
                    echo "<p>Karena BMI Anda menunjukkan Anda berada dalam kategori underweight, penting untuk fokus pada diet seimbang dengan banyak lemak sehat, protein, dan karbohidrat untuk mendukung kenaikan berat badan dan perkembangan otot.</p>";
                    echo "<ul>
                        <li><strong>Lemak Sehat:</strong> Tambahkan lebih banyak alpukat, kacang-kacangan, biji-bijian, minyak zaitun, dan minyak kelapa dalam diet Anda.</li>
                        <li><strong>Protein:</strong> Konsumsi daging tanpa lemak, ikan, telur, produk susu, dan protein nabati seperti kacang-kacangan dan lentil.</li>
                        <li><strong>Karbohidrat:</strong> Pilih karbohidrat kompleks seperti roti gandum utuh, pasta, nasi merah, quinoa, dan kentang.</li>
                        <li><strong>Frekuensi Makan:</strong> Cobalah untuk makan lebih sering dengan porsi kecil dan snack sehat di antara waktu makan.</li>
                    </ul>";
                    break;
                case 'Normal':
                    echo "<p>Dengan BMI normal, mempertahankan diet seimbang dengan banyak buah, sayuran, protein tanpa lemak, dan biji-bijian utuh adalah penting untuk kesehatan secara keseluruhan.</p>";
                    echo "<ul>
                        <li><strong>Buah dan Sayuran:</strong> Pastikan Anda mengonsumsi berbagai macam buah dan sayuran setiap hari untuk mendapatkan vitamin dan mineral penting.</li>
                        <li><strong>Protein:</strong> Pilih sumber protein tanpa lemak seperti ayam, kalkun, ikan, dan kacang-kacangan.</li>
                        <li><strong>Biji-bijian Utuh:</strong> Konsumsi roti gandum utuh, pasta gandum utuh, beras merah, dan oat untuk mendapatkan serat yang cukup.</li>
                        <li><strong>Hidrasi:</strong> Minum cukup air setiap hari untuk menjaga tubuh tetap terhidrasi.</li>
                    </ul>";
                    break;
                case 'Overweight':
                    echo "<p>Menjadi overweight dapat meningkatkan risiko masalah kesehatan. Pertimbangkan untuk mengurangi asupan kalori sedikit dan fokus pada makanan padat nutrisi untuk mendukung penurunan berat badan yang bertahap dan peningkatan kesehatan.</p>";
                    echo "<ul>
                        <li><strong>Kontrol Porsi:</strong> Perhatikan ukuran porsi untuk menghindari makan berlebihan. Gunakan piring yang lebih kecil untuk membantu mengontrol porsi.</li>
                        <li><strong>Makanan Padat Nutrisi:</strong> Pilih makanan yang tinggi nutrisi tetapi rendah kalori seperti sayuran hijau, buah-buahan, dan protein tanpa lemak.</li>
                        <li><strong>Hindari Makanan Olahan:</strong> Kurangi konsumsi makanan olahan, manis, dan berlemak tinggi yang dapat meningkatkan asupan kalori tanpa memberikan nutrisi yang diperlukan.</li>
                        <li><strong>Aktivitas Fisik:</strong> Tingkatkan aktivitas fisik harian Anda dengan olahraga rutin untuk membantu membakar kalori ekstra.</li>
                    </ul>";
                    break;
                case 'Obese':
                    echo "<p>Obesitas terkait dengan berbagai risiko kesehatan. Penting untuk fokus pada penurunan berat badan secara bertahap melalui kombinasi nutrisi seimbang dan olahraga teratur untuk meningkatkan kesehatan secara keseluruhan.</p>";
                    echo "<ul>
                        <li><strong>Kalori Seimbang:</strong> Kurangi asupan kalori dengan mengurangi makanan tinggi kalori dan rendah nutrisi seperti makanan cepat saji dan minuman manis.</li>
                        <li><strong>Serat Tinggi:</strong> Makan lebih banyak makanan berserat tinggi seperti buah-buahan, sayuran, biji-bijian utuh, dan kacang-kacangan untuk membantu kenyang lebih lama.</li>
                        <li><strong>Protein Berkualitas:</strong> Fokus pada sumber protein berkualitas tinggi seperti ikan, ayam tanpa kulit, kacang-kacangan, dan produk susu rendah lemak.</li>
                        <li><strong>Olahraga Teratur:</strong> Kombinasikan latihan kardio dengan latihan kekuatan untuk meningkatkan pembakaran kalori dan membangun massa otot.</li>
                        <li><strong>Konsultasi Profesional:</strong> Pertimbangkan untuk berkonsultasi dengan ahli gizi atau profesional kesehatan untuk mendapatkan rencana diet yang tepat.</li>
                    </ul>";
                    break;
                default:
                    echo "<p>Tidak dapat menentukan rekomendasi nutrisi saat ini.</p>";
                    break;
            }
            ?>
        </section>

        <section class="results">
            <h2>Rekomendasi Latihan</h2>
            <?php
            // Menampilkan rekomendasi latihan berdasarkan kategori BMI dari database
            $sql = "SELECT name, description, image_url FROM exercises WHERE bmi_category = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $bmi_category);
            $stmt->execute();
            $stmt->bind_result($exercise_name, $exercise_description, $exercise_image_url);
            while ($stmt->fetch()) {
                echo "<div class='exercise'>";
                echo "<h3>$exercise_name</h3>";
                echo "<img src='admin/$exercise_image_url' alt='$exercise_name' class='exercise-image'>";
                echo "<p>$exercise_description</p>";
                echo "</div>";
            }
            $stmt->close();
            ?>
            <a href='index.php' class='cta-btn'>Kembali</a>
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
