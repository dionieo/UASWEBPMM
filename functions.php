<?php
    $connect = mysqli_connect("localhost", "root", "", "tugas uas");


    function query($query){
        global $connect;
        $result = mysqli_query($connect, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ){
            $rows[] = $row;
        }
        return $rows;
    }



    function addData($dataAdd){
        global $connect;

        $nama_mahasiswa = htmlspecialchars($dataAdd["nama_mahasiswa"]);
        $nrp = htmlspecialchars($dataAdd["nrp"]);
        $tanggal_lahir = htmlspecialchars($dataAdd["tanggal_lahir"]);
        $jenis_kelamin = htmlspecialchars($dataAdd["jenis_kelamin"]);
        $agama = htmlspecialchars($dataAdd["agama"]);
        $alamat = htmlspecialchars($dataAdd["alamat"]);
        $gambar = upload();
        if (!$gambar){
            return false;
        }

        $query = "INSERT INTO twice VALUES 
        ('', '$nama_mahasiswa', '$nrp', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$gambar'
        )";

        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $errorFile = $_FILES['gambar']['error'];
        $tmpFile = $_FILES['gambar']['tmp_name'];


        if($errorFile === 4){
            echo "<script>
                alert('Harap upload file gambar terlebih dahulu');
            </script>";
            return false;
        }

        $validExtension = ['jpeg', 'jpg', 'png'];
        $fileExtension = explode('.', $namaFile);
        $fileExtension = strtolower(end($fileExtension));

        if (!in_array($fileExtension, $validExtension)){
            echo "<script>
                alert('Yang anda upload bukan gambar');
            </script>";
            return false;
        }

        if ($ukuranFile > 6000000) {
            echo "<script>
                alert('Ukuran file nya gede bet dah lu upload foto atau GTA V');
            </script>";
            return false;
        }

        $newFileName = uniqid();
        $newFileName .= ".";
        $newFileName .= $fileExtension;

        move_uploaded_file($tmpFile, 'img/' . $newFileName);
        return $newFileName;
    }


    function deleteData($deleteData){
        global $connect;
        $file = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM twice WHERE id='$deleteData'"));
        unlink('img/' . $file["gambar"]);
        $delete = "DELETE FROM twice WHERE id='$deleteData'";
        mysqli_query($connect,$delete);
        return mysqli_affected_rows($connect);
    }

    function editData($dataEdit){
        global $connect;

        $id = $dataEdit["id"];
        $stage_name = htmlspecialchars($dataEdit["stage_name"]);
        $birth_name = htmlspecialchars($dataEdit["birth_name"]);
        $nationality = htmlspecialchars($dataEdit["nationality"]);
        $birthday = htmlspecialchars($dataEdit["birthday"]);
        $position = htmlspecialchars($dataEdit["position"]);
        $instagram = htmlspecialchars($dataEdit["instagram"]);
        $oldPic = htmlspecialchars($dataEdit["oldPic"]);
        
        // $gambar = htmlspecialchars($dataEdit["gambar"]);

        if ($_FILES['gambar']['error'] === 4){
            $gambar = $oldPic;
        }
        else {
            $gambar = upload();
        }

        $query = "UPDATE twice SET 
                    stage_name = '$stage_name',
                    birth_name = '$birth_name',
                    nationality = '$nationality',
                    birthday = '$birthday',
                    position = '$position',
                    instagram = '$instagram',
                    gambar = '$gambar'
                    WHERE id = $id";

        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function findData($keyword){
        $collumn = $_POST['collumn'];
        $query = "SELECT * FROM twice WHERE 
        $collumn LIKE '%$keyword%'";
        return query($query);
    }

    function registration($data){
        global $connect;
        $username = strtolower(stripslashes($data["username"]));
        $pass = mysqli_real_escape_string($connect, $data["password"]);
        
        $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                alert('Waduh, username sudah terdaftar');
            </script>";
            return false;
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_query($connect, "INSERT INTO users VALUES ('', '$username', '$pass')");
        return mysqli_affected_rows($connect);
    }
?>