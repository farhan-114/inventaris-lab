<?php include "auth.php"; ?>
<!DOCTYPE html><html lang="id"><head>
  <meta charset="UTF-8"><title>Inventaris QR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
  <div class="container mt-4">
    <div class="d-flex justify-content-between">
      <h2>Inventaris Barang</h2>
      <a href="logout.php" class="btn btn-outline-secondary">Logout</a>
    </div>
    <div class="card p-3 mt-3">
      <div id="preview" style="width:100%;"></div>
      <button id="startScan" class="btn btn-primary mt-3">Mulai Scan QR</button>
      <button id="resetScan" class="btn btn-secondary mt-2">Reset Scanner</button>
      <canvas id="snapshotCanvas" style="display:none;"></canvas>
    </div>

    <div class="card p-3 mt-3">
      <h5>Input Manual Barang</h5>
      <form id="formManual">
        <input id="kodeManual" class="form-control mb-2" placeholder="Kode Barang" required>
        <input id="namaManual" class="form-control mb-2" placeholder="Nama Barang" required>
        <button class="btn btn-success w-100">Simpan Manual</button>
      </form>
    </div>

    <div class="card p-3 mt-3">
      <h5>Data Barang yang Tersimpan</h5>
      <input type="text" id="searchInput" class="form-control mb-2" placeholder="Cari barang...">
      <table class="table table-bordered"><thead><tr>
        <th>No</th><th>Kode</th><th>Nama</th><th>Sumber</th><th>Tanggal</th><th>Foto</th>
      </tr></thead><tbody id="barangBody"></tbody></table>
      <button class="btn btn-danger" onclick="hapusSemua()">Hapus Semua Data</button>
    </div>
  </div>

  <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
  <script>
    let scanner;
    const startScanBtn = document.getElementById("startScan");

    startScanBtn.addEventListener("click", () => {
      if (!scanner) {
        scanner = new Html5Qrcode("preview");
        scanner.start(
          { facingMode: "environment" },
          { fps: 10, qrbox: 250 },
          qrCodeMessage => {
            const canvas = document.getElementById("snapshotCanvas");
            const video = document.querySelector("video");

            if (video) {
              const ctx = canvas.getContext("2d");
              canvas.width = video.videoWidth;
              canvas.height = video.videoHeight;
              ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
              const imageData = canvas.toDataURL("image/png");

              fetch("simpan_gambar.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `kode=${encodeURIComponent(qrCodeMessage)}&nama=Scan QR&sumber=scan&image=${encodeURIComponent(imageData)}`
              }).then(res => res.text()).then(txt => {
                alert("QR Scan dan foto disimpan!");
                tampilkanData();
              });
            }

            scanner.stop();
            scanner.clear();
            scanner = null;
          },
          err => {}
        ).catch(err => alert("Kamera error: " + err));
      }
    });

    document.getElementById("resetScan").addEventListener("click", () => {
      if (scanner) {
        scanner.stop().then(() => {
          scanner.clear();
          scanner = null;
        });
      }
    });

    document.getElementById("formManual").addEventListener("submit", e => {
      e.preventDefault();
      const kode = document.getElementById("kodeManual").value;
      const nama = document.getElementById("namaManual").value;
      fetch("simpan_barang.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `kode=${encodeURIComponent(kode)}&nama=${encodeURIComponent(nama)}&sumber=manual`
      }).then(res => res.text()).then(txt => {
        if (txt === "OK") {
          alert("Data manual berhasil disimpan!");
          document.getElementById("formManual").reset();
          tampilkanData();
        } else alert("Ada kesalahan: " + txt);
      });
    });

    function tampilkanData() {
      fetch("tampil_barang.php")
        .then(res => res.json()).then(data => {
          const tbody = document.getElementById("barangBody");
          tbody.innerHTML = "";
          data.forEach((item, i) => {
            tbody.innerHTML += `<tr>
              <td>${i + 1}</td>
              <td>${item.kode_barang}</td>
              <td>${item.nama_barang}</td>
              <td>${item.sumber_input}</td>
              <td>${item.tanggal_input}</td>
              <td>${item.foto ? `<img src="data:image/png;base64,${item.foto}" width="80">` : '-'}</td>
            </tr>`;
          });
        });
    }
    tampilkanData();

    document.getElementById("searchInput").addEventListener("input", function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll("#barangBody tr");
      rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
      });
    });

    function hapusSemua() {
      if (confirm("Yakin hapus semua data?")) {
        fetch("hapus_data.php")
          .then(res => res.text()).then(txt => {
            if (txt === "OK") {
              alert("Semua data dihapus");
              tampilkanData();
            } else alert("Error: " + txt);
          });
      }
    }
  </script>
</body></html>