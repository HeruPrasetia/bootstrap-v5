<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="halaman.php" method="post">
        nama lengkap
        <p></p>
        <input type="text" name="nama" id="nama">
        <p></p>
        tanggal lahir
        <p></p>
        <input type="date" name="tanggal" id="tanggal">
        <p></p>
        jenis kelamin
        <p></p>
        <select name="jenis kelamin" id="jeniskelamin">
            <option value="laki laki">laki laki</option>
            <option value="perempuan">perempuan</option>
            <option value="tak berkelamin">tak berkelamin</option>
        </select>
        <p></p>
        <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="alamat rumah"></textarea>
        <p></p>
        <input type="checkbox" name="syarat" id="syarat">tinggi
        <p></p>
        <input type="checkbox" name="syarat" id="syarat">putih
        <p></p>
        <input type="checkbox" name="syarat" id="syarat">mulus
        <p>
            <input type="reset" value="reset">
            <input type="submit" value="submit">
            <a href="/"><button>kembali</button></a>
        </p>
    </form>

</body>

</html>