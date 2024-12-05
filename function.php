<?php
include "database.php";

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $query = "DELETE FROM kritik_pelanggan WHERE id_umpan_balik = $id";

    // Pastikan query berhasil dijalankan
    if (mysqli_query($connection, $query)) {
        // Jika berhasil, redirect ke index.php
        header("Location: index.php"); // Kembali ke halaman utama setelah delete
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['login'])) {
    login($_POST);
}

if (isset($_POST['register'])) {
    register($_POST);
}

function get_data($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);

    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;

    
}

function add_data($data)
{
    global $connection;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenis_umpan_balik = $_POST['jenis_umpan_balik'];
    $isi_umpan_balik = $_POST['isi_umpan_balik'];
    $image = $_FILES['image']['name'];
    $tmp_file = $_FILES['image']['tmp_name'];
    $image_name = $_SERVER['DOCUMENT_ROOT'] . "/images/" . $image;
    move_uploaded_file($tmp_file, $image_name);
    $tambah = mysqli_query($connection, "INSERT INTO kritik_pelanggan (nama, email, jenis_umpan_balik, isi_umpan_balik, image)
VALUES ('$nama', '$email', '$jenis_umpan_balik', '$isi_umpan_balik', '$image')");
    return mysqli_affected_rows($connection);
}

function edit_data($data)
{
    global $connection;

    $id = mysqli_real_escape_string($connection, $data['id']);
    $nama = mysqli_real_escape_string($connection, htmlspecialchars($data['nama']));
    $email = mysqli_real_escape_string($connection, htmlspecialchars($data['email']));
    $jenis_umpan_balik = mysqli_real_escape_string($connection, htmlspecialchars($data['jenis_umpan_balik']));
    $isi_umpan_balik = mysqli_real_escape_string($connection, htmlspecialchars($data['isi_umpan_balik']));
    $current_image = mysqli_real_escape_string($connection, $data['current_image']);

    // Proses file gambar jika ada yang baru
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp_file = $_FILES['image']['tmp_name'];
        $image_path = $_SERVER['DOCUMENT_ROOT'] . "/images/" . $image;

        move_uploaded_file($tmp_file, $image_path);
    } else {
        $image = $current_image; // Tetap menggunakan gambar lama
    }

    // Query UPDATE
    $query = "UPDATE kritik_pelanggan SET 
                nama = '$nama', 
                email = '$email', 
                jenis_umpan_balik = '$jenis_umpan_balik', 
                isi_umpan_balik = '$isi_umpan_balik', 
                image = '$image'
              WHERE id_umpan_balik = '$id'";

    $result = mysqli_query($connection, $query);

    if (mysqli_affected_rows($connection) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal mengubah data: " . mysqli_error($connection) . "');
        </script>";
    }
}








function delete_data($id)
{
    global $connection; // Ensure $connection is declared globally

    // Escape nilai ID untuk menghindari injeksi SQL
    $id = mysqli_real_escape_string($connection, $id);

    // Jalankan query DELETE
    $delete_query = "DELETE FROM kritik_pelanggan WHERE id_umpan_balik = '$id'";
    $result = mysqli_query($connection, $delete_query);

    // Periksa apakah query berhasil
    if (!$result) {
        die("Query Error: " . mysqli_error($connection));
    }

    // Periksa apakah ada baris yang terpengaruh
    if (mysqli_affected_rows($connection) > 0) {
        return true; // Data berhasil dihapus
    } else {
        echo "Data tidak ditemukan atau sudah dihapus.";
        return false; // Tidak ada data yang terhapus
    }
}





function login($data)
{
    global $connection;

    // Sanitasi input
    $username = mysqli_real_escape_string($connection, htmlspecialchars($data['username']));
    $password = htmlspecialchars($data['password']); // Tidak perlu escape password karena akan diverifikasi

    // Cek apakah username ada
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    // Jika username tidak ditemukan
    if (mysqli_num_rows($result) == 0) {
        echo "<script>
            alert('Username tidak ditemukan');
            </script>";
        return false;
    }

    // Ambil data user
    $user = mysqli_fetch_assoc($result);

    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        echo "<script>
            alert('Berhasil login');
            window.location.href = 'dashboard.php';
            </script>";
    } else {
        echo "<script>
            alert('Password salah');
            </script>";
    }
}


function register($data)
{
    global $connection;

    // Sanitasi input
    $fullname = mysqli_real_escape_string($connection, htmlspecialchars($data['fullname']));
    $username = mysqli_real_escape_string($connection, htmlspecialchars($data['username']));
    $password = mysqli_real_escape_string($connection, htmlspecialchars($data['password']));

    // Cek apakah username sudah ada
    $query = "SELECT * FROM users WHERE username = '$username'";
    $cek_user = get_data($query);
    if (count($cek_user) > 0) {
        echo "<script>
            alert('Username sudah ada');
            </script>";
        return false;
    }

    // Hash password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert ke database
    $insert = "INSERT INTO users (nama_lengkap, username, password) VALUES ('$fullname', '$username', '$password')";
    $test = mysqli_query($connection, $insert);

    // Cek apakah query berhasil
    if ($test) {
        echo "<script>
            alert('Berhasil register');
            window.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal register: " . mysqli_error($connection) . "');
            </script>";
    }
}

function upload()
{
    $originalName = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    if (
        $error === 4
    ) {
        echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
        return false;
    }

    $validExtension = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $originalName);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $validExtension)) {
        echo "<script>
				alert('File bukan gambar');
			  </script>";
        return false;
    }

    if ($filesize > 1000000) {
        echo "<script>
				alert('Ukuran gambar terlalu besar!');
			  </script>";
        return false;
    }

    $imgFolder = $_SERVER['DOCUMENT_ROOT'] . '/assets/upload/';

    if (!is_dir($imgFolder)) {
        mkdir($imgFolder, 0755, true);
    }
    $newFilename = uniqid() . '.' . $ekstensiGambar;
    move_uploaded_file($tmpName, $imgFolder . $newFilename);

    return $newFilename;
}

function get_data_count($table_name)
{
    global $connection;

    $query = "SELECT COUNT(*) AS total FROM $table_name";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    } else {
        return 0; // Return 0 if the query fails
    }
}

