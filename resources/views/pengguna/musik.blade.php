<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deteksi Nada Musik</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .result-box {
            margin-top: 20px;
            padding: 15px;
            background: #eef8ff;
            border-left: 4px solid #0b79d0;
            display: none;
        }
        .loading {
            margin-top: 20px;
            padding: 10px;
            background: #fff8c6;
            border-left: 4px solid #d0b20b;
            display: none;
        }

        .section-title {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
        }
        .recommend-box {
            background: #fff;
            padding: 10px;
            border-radius: 6px;
            margin-top: 8px;
            border: 1px solid #cdd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🎵 Deteksi Nada Musik</h2>
    <p>Upload file audio untuk mendeteksi frekuensi, nama nada, dan rekomendasi alat musik Maluku.</p>

    <form id="musicForm" enctype="multipart/form-data">
        @csrf
        <input type="file" name="audio" id="audio" accept="audio/*" required>
        <br><br>
        <button type="submit">Deteksi Nada</button>
    </form>

    <div class="loading" id="loadingBox">
        ⏳ Sedang memproses audio...
    </div>

    <div class="result-box" id="resultBox">
        <h3>Hasil Deteksi:</h3>
        <p><strong>Frekuensi:</strong> <span id="freq"></span> Hz</p>
        <p><strong>Nada:</strong> <span id="note"></span></p>

        <div class="section-title">🎶 Rekomendasi Instrumen Maluku</div>

        <div class="recommend-box">
            <strong>Totobuang:</strong>
            <p id="totobuang"></p>
        </div>

        <div class="recommend-box">
            <strong>Tifa:</strong>
            <p id="tifa"></p>
        </div>

        <div class="recommend-box">
            <strong>Suling:</strong>
            <p id="suling"></p>
        </div>
    </div>
</div>

<script>
document.getElementById('musicForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    document.getElementById('loadingBox').style.display = "block";
    document.getElementById('resultBox').style.display = "none";

    fetch("/detect-pitch", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('loadingBox').style.display = "none";

        if (data.status === false) {
            alert(data.message);
            return;
        }

        // Nada & Frekuensi
        document.getElementById('freq').textContent = data.frequency;
        document.getElementById('note').textContent = data.note;

        // Rekomendasi
        document.getElementById('totobuang').textContent = data.recommendations.totobuang ?? "Tidak ada rekomendasi.";
        document.getElementById('tifa').textContent = data.recommendations.tifa ?? "Tidak ada rekomendasi.";
        document.getElementById('suling').textContent = data.recommendations.suling ?? "Tidak ada rekomendasi.";

        document.getElementById('resultBox').style.display = "block";
    })
    .catch(err => {
        alert("Terjadi kesalahan saat memproses audio.");
        console.log(err);
        document.getElementById('loadingBox').style.display = "none";
    });
});
</script>

</body>
</html>
