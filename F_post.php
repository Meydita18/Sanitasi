<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Mahasiswa</title>
    <style>
        /* CSS agar tampilan bersih, rapi, dan responsive [cite: 5] */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding: 20px; }
        .container { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { color: #333; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], input[type="email"], textarea, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .btn-submit { background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        .btn-submit:hover { background-color: #218838; }
    </style>
    <script>
        function validasiForm() {
            var nama = document.forms["myForm"]["nama"];
            var umur = document.forms["myForm"]["umur"];

            // Validasi Nama [cite: 7, 8, 9]
            if (nama.value == "") {
                alert("Isian Nama tidak boleh kosong!");
                nama.focus();
                return false;
            }
            if (/\d/.test(nama.value)) {
                alert("Isian tidak boleh mengandung angka");
                nama.focus();
                return false;
            }

            // Validasi Umur [cite: 10, 11, 12]
            if (umur.value == "") {
                alert("Isian kosong (Umur)!");
                umur.focus();
                return false;
            }
            if (/[a-zA-Z]/.test(umur.value)) {
                alert("Isian tidak boleh mengandung huruf");
                // Instruksi menyebutkan kursor kembali ke Nama [cite: 12]
                nama.focus(); 
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Formulir Data Mahasiswa</h2>
        <form name="myForm" action="proses_post_sanitasi.php" method="post" onsubmit="return validasiForm()">
            <div class="form-group">
                <label>NIM:</label>
                <input type="text" name="nim">
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama">
            </div>
            <div class="form-group">
                <label>Umur:</label>
                <input type="text" name="umur">
            </div>
            <button type="submit" class="btn-submit">Kirim Data</button>
        </form>
    </div>
</body>
</html>