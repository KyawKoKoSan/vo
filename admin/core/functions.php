<?php

//common fuctions start

function alert($data, $color = "danger")
{
    $data = strtoupper($data);
    return "    
    <div class='alert alert-dismissible alert-$color'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      <p class='alert-heading mb-0'>$data</p>
    </div>
";
}

function redirect($l)
{
    header("location:$l");
}

function linkTo($l)
{
    echo "<script>location.href='$l'</script>";
}

function fetch($sql)
{
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function fetchAll($sql)
{
    $sql->execute();
    $rows = [];
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        array_push($rows, $row);
    }
    return $rows;
}

function showTime($timestamp, $format = "d-m-y")
{
    return date($format, strtotime($timestamp));
}

function countTotal($table, $condition = 1)
{
    $sql = con()->prepare("SELECT COUNT(id) FROM $table WHERE $condition");
    $total = fetch($sql);
    return $total['COUNT(id)'];
}

function short($str, $length = "30")
{
    return substr($str, 0, $length) . "...";
}

function textFilter($text)
{
    $text = trim($text);
    $text = htmlentities($text, ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}

function imageFilter($files, $original_image = "")
{
    if ($files['tmp_name'] != "") {
        $filename = $files['name'];
        $filesize = $files['size'];
        $filetmp = $files['tmp_name'];
        $filetype = $files['type'];
        $fext = explode("/", $filetype);
        $fileex = strtolower(end($fext));
        $extension = array("jpeg", "png", "jpg", "gif");
        if (in_array($fileex, $extension) == FALSE) {
            $errors[] = "Please Upload the valid file type";
        } else if ($filesize > 2097152) {
            $errors[] = "File size is too big";
        } else if (empty($errors) == TRUE) {
            move_uploaded_file($filetmp, "images/" . $filename);
            return $filename;
        } else {
            print_r($errors);
        }
    } else {
        return $filename = $original_image;
    }
}

function imageFilterRegister($files, $original_image = "")
{
    if ($files['tmp_name'] != "") {
        $filename = $files['name'];
        $filesize = $files['size'];
        $filetmp = $files['tmp_name'];
        $filetype = $files['type'];
        $fext = explode("/", $filetype);
        $fileex = strtolower(end($fext));
        $extension = array("jpeg", "png", "jpg", "gif");
        if (in_array($fileex, $extension) == FALSE) {
            $errors[] = "Please Upload the valid file type";
        } else if ($filesize > 2097152) {
            $errors[] = "File size is too big";
        } else if (empty($errors) == TRUE) {
            move_uploaded_file($filetmp, "images/" . $filename);
            return $filename;
        } else {
            print_r($errors);
        }
    } else {
        return $filename = "default.png";
    }
}

function checkPassword($password, $original_password = "")
{
    if ($password != "") {
        $sPass = password_hash($password, PASSWORD_DEFAULT);
        return $sPass;
    } else {
        return $original_password;
    }
}

//common functions end





//admin management start
function register()
{
    $email = textFilter(strip_tags($_POST['email']));
    $sql = "SELECT * FROM admins WHERE email=?";
    $sq = con()->prepare($sql);
    $sq->execute([$email]);
    $no = $sq->rowCount();
    echo $no;
    if ($no >= 1) {
        linkTo("register.php?already_exist=user");
    } else {
        $name = textFilter(strip_tags($_POST['name']));
        $role = $_POST['role'];
        $password = $_POST['password'];
        $cPassword = $_POST['cPassword'];
        $image = imageFilterRegister($_FILES['image']);
        $sPass = password_hash($password, PASSWORD_DEFAULT);
        if ($password == $cPassword) {
            $sql = "INSERT INTO admins (name,email,password,role,photo) VALUES (?,?,?,?,?)";
            $sq = con()->prepare($sql);
            if ($sq->execute(array($name, $email, $sPass, $role, $image))) {
                linkTo("register.php?result=success");
            }
        } else {
            return alert("Password do not match!!!");
        }
    }
}

function login()
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admins WHERE email=?";
    $sq = con()->prepare($sql);
    $sq->execute([$email]);
    $row = $sq->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        return alert("Invalid Login");
    } else {
        //        print_r($row);
        if (!password_verify($password, $row['password'])) {
            return alert("Invalid Login");
        } else {
            session_start();
            $_SESSION['user'] = $row;
            redirect("index.php");
        }
    }
}

function user($id)
{
    $sql = con()->prepare("SELECT * FROM admins where id = $id");
    return fetch($sql);
}

function users()
{
    $sql = con()->prepare("SELECT * FROM admins");
    return fetchAll($sql);
}

function adminUpdate()
{
    $id = $_POST['id'];
    $name = textFilter(strip_tags($_POST['name']));
    $email = textFilter(strip_tags($_POST['email']));
    $role = $_POST['role'];
    $password = $_POST['password'];
    $original_image = $_POST['original_image'];
    $original_password = $_POST['original_password'];
    $sPass = checkPassword($password, $original_password);
    $image = imageFilter($_FILES['image'], $original_image);
    $sql = con()->prepare("UPDATE admins SET name=?,email=?,password=?,role=?,photo=? WHERE id=?");
    $sql->execute(array($name, $email, $sPass, $role, $image, $id));
    return $sql;
}

function adminDelete($id)
{
    $sql = con()->prepare("DELETE FROM admins WHERE id = ?");
    $sql->execute([$id]);
    return $sql;
}
//admin management end