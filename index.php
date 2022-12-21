<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
  <link rel="stylesheet" href="./main.css">
  <link rel="stylesheet" href="./component.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <div>
        <a href="#intro" class="my">MY</a>
      </div>
    </nav>
  </header>
  <main class="mt-16 h-[100vh] mx-10 ">

    <h1 class="text-xl font-bold  mb-5 ">Data Siswa <br></h1>
    <a href="form_simpan.php" class="bg-blue-500 text-white hover:opacity-90 hover:scale-110 transition-all p-2 rounded-md">Tambah Data</a><br><br>
    <a href="pdfdownload.php" class="bg-gray-500 text-white hover:opacity-90 hover:scale-110 transition-all p-2 rounded-md">Donwload pdf</a><br><br>
    <table class="w-full text-sm text-left text-gray-500 ">
      <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
        <tr>
          <th scope="col" class="py-3 px-6">
            Foto
          </th>
          <th scope="col" class="py-3 px-6">
            NIS
          </th>
          <th scope="col" class="py-3 px-6">
            NAMA
          </th>
          <th scope="col" class="py-3 px-6">
            JENIS KELAMIN
          </th>
          <th scope="col" class="py-3 px-6">
            TELEPON
          </th>
          <th scope="col" class="py-3 px-6">
            ALAMAT
          </th>
          <th scope="col" class="py-3 px-6">
            AKSI
          </th>
        </tr>
      </thead>
      <tbody class="[&>*>td]:py-4 [&>*>td]:px-6 ">
        <?php
        // Load file koneksi.php
        include "koneksi.php";
        // Buat query untuk menampilkan semua data siswa
        $sql = $pdo->prepare("SELECT * FROM siswa");
        $sql->execute(); // Eksekusi querynya
        while ($data = $sql->fetch()) {
          echo "<tr class=' bg-white border-b '>";
          echo "<td scope='row' class='font-medium text-gray-900 whitespace-nowrap' ><img src='images/" . $data['foto'] . "' width='200'></td>";
          echo "<td>" . $data['nis'] . "</td>";
          echo "<td>" . $data['nama'] . "</td>";
          echo "<td>" . $data['jenis_kelamin'] . "</td>";
          echo "<td>" . $data['telp'] . "</td>";
          echo "<td>" . $data['alamat'] . "</td>";
          echo "<td>";
          echo "<a href='form_ubah.php?id=" . $data['id'] . "' class='p-2 rounded-md mr-2 bg-blue-500 text-white hover:opacity-90 hover:scale-110 transition-all'>Ubah</a>";
          echo "<a href='proses_hapus.php?id=" . $data['id'] . "' class='p-2 rounded-md mr-2 bg-red-500 text-white hover:opacity-90 hover:scale-110 transition-all'>Hapus</a>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </main>
  <footer class="static">
    <span>© 2022 Muhammad Yunus</span>
    <ul>
      <li>
        <a href="https://www.instagram.com/snymnd/" class=" "><i class="fa fa-instagram"></i></a>
      </li>
      <li>
        <a href="https://github.com/snymnd" class=""> <i class="fa fa-github"></i></a>
      </li>
      <li>
        <a href="https://www.linkedin.com/in/muhammad-yunus-68920021b/" class="mr-4 "><i class="fa fa-linkedin"></i></a>
      </li>
      <li>
        <a href="mailto: muh.yunus310502@gmail.com"><i class="fa fa-envelope "></i></a>
      </li>
    </ul>
  </footer>
</body>

</html>