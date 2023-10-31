<!DOCTYPE html>
<html>

<head>
    <title>Contoh Select HTML dengan PHP</title>
</head>

<body>
    <h1>Contoh Select HTML dengan PHP</h1>

    <!-- Form Select -->
    <select id="pilihan" onchange="ubahTampilan()">
        <option value="pilihan1">Pilihan 1</option>
        <option value="pilihan2">Pilihan 2</option>
        <option value="pilihan3">Pilihan 3</option>
    </select>

    <!-- Tampilan yang akan berubah -->
    <div id="tampilan">
        <p>Ini adalah tampilan awal.</p>
    </div>

    <script>
        // Fungsi untuk mengubah tampilan berdasarkan pilihan
        function ubahTampilan() {
            var select = document.getElementById("pilihan");
            var tampilan = document.getElementById("tampilan");

            var pilihan = select.value;

            if (pilihan === "pilihan1") {
                tampilan.innerHTML = "<p>Anda memilih Pilihan 1.</p>";
            } else if (pilihan === "pilihan2") {
                tampilan.innerHTML = "<p>Anda memilih Pilihan 2.</p>";
            } else if (pilihan === "pilihan3") {
                tampilan.innerHTML = "<p>Anda memilih Pilihan 3.</p>";
            }
        }
    </script>
</body>

</html>