<?php

require_once __DIR__ . '/config.php';
// require_once '.config/config.php';

function login($post)
{
    if (count($post) > 0) {
        global $db;
        $email = trim($post['email']);
        $password = trim(md5($post['password']));
        $checkData =  [
            ':email' => $email,
            ':password' => $password,
        ];
        $sql = 'Select id,email,password FROM users where email =:email and password =:password';
        // 'Select email,password FROM users where email =:email or password =:password';
        $data = $db->prepare($sql);
        $data->execute($checkData);
        $row = $data->fetch(PDO::FETCH_ASSOC);

        if (count($row) > 0) {
            $_SESSION['user']['id'] = $row['id'];
            echo 'Yonlendirilirsiniz ';
            sleep(2);
            header('Location: index.php');
            die;
        }
    }
}
function getUserFullname()
{
    global $db;
    $sql = 'Select fullname FROM users where id=:id';
    $checkData =  [
        ':id' => $_SESSION['user']['id'],
    ];
    // 'Select email,password FROM users where email =:email or password =:password';
    $data = $db->prepare($sql);
    $data->execute($checkData);
    $row = $data->fetch(PDO::FETCH_ASSOC);
    if (count($row) > 0) {
        return $row['fullname'];
    } else {
        header('Location: index.php');
        die;
    }
}
function logout()
{
    if (isset($_SESSION['user']['id']) and $_SESSION['user']['id'] > 0) {
        unset($_SESSION['user']['id']);
        header('Location: login.php');
        die;
    }
}
function getAllUsers()
{
    global $db;
    $sql = 'Select * FROM users ';

    // 'Select email,password FROM users where email =:email or password =:password';
    $data = $db->prepare($sql);
    $data->execute();
    $row = $data->fetchAll(PDO::FETCH_ASSOC);
    if (count($row) > 0) {
        return $row;
    } else {
        header('Location: index.php');
        die;
    }
}
function deleteUser($user_id)
{
    global $db;
    $sql = 'DELETE FROM users WHERE id=:id';
    $data = $db->prepare($sql);
    $data->bindParam(':id', $user_id, PDO::PARAM_INT);
    $exec = $data->execute();
    if ($exec) {
        $loc = explode('/', $_SERVER['REQUEST_URI']);
        $loc = $loc[count($loc) - 1];

        header('Location:index.php?page=users&action=all&operation=true');
        die;
    }
}
function getUserDetail($user_id)
{
    global $db;
    $sql = "Select * from users where id=:id";
    $data = $db->prepare($sql);
    $data->bindParam(':id', $user_id, PDO::PARAM_INT);
    $data->execute();
    $user = $data->fetch(PDO::FETCH_ASSOC);

    if (count($user) > 0) {
        return $user;
    } else {
        return [];
    }
}
function updateUserDetail($user_id, $post)
{
    global $db;

    if (isset($post['update_user'])) {
        if (empty($post['password'])) {
            unset($post['password']);
        }
        if (empty($post['password_conf'])) {
            unset($post['password_conf']);
        }
        if (empty($post['update_user'])) {
            unset($post['update_user']);
        }
        $keys = array_keys($post);
        $sqlKeys = [];
        foreach ($keys as $key => $val) {
            $sqlKeys[] = $val . "=:" . $val;
        }
        $sqlKeys = implode(',', $sqlKeys);
        $execPost = [];
        foreach ($post as $key => $data) {
            $execPost[':' . $key] = $data;
        }
        $execPost[':id'] = $user_id;
        $sql = "UPDATE users SET " . $sqlKeys . " WHERE id=:id";
        $data = $db->prepare($sql);
        $row = $data->execute($execPost);
        if ($row) {
            header('Location:index.php?page=users&action=update&id=' . $user_id . '&operation=true');
            die;
        }
    }
    // print_r(__DIR__ . '/config.php');
}
function storeUser($post)
{
    global $db;

    if (isset($post['store_user'])) {
        if (empty($post['store_user'])) {
            unset($post['store_user']);
        }
        if (isset($post['password_conf'])) {
            unset($post['password_conf']);
        };

        $post['password']=md5($post['password']);
        $keys = array_keys($post);
        // print_r($keys);
        $sqlKeys = [];
        foreach ($keys as $key => $val) {
            $sqlKeys[] = $val . "=:" . $val;
        }
        $sqlKeys = implode(',', $sqlKeys);
        $execPost = [];
        foreach ($post as $key => $data) {
            $execPost[':' . $key] = $data;
        }
        $sql = "INSERT INTO users SET " . $sqlKeys;

        $data = $db->prepare($sql);
        $row = $data->execute($execPost);
        if ($row) {
            header('Location:index.php?page=users&action=create&operation=true');
            die;
        }
    }
   
}
function storeComment($post)
{
    global $db;
    if (isset($post['store_comment'])) {
        if (empty($post['store_comment'])) {
            unset($post['store_comment']);
        }
        $post['user_id'] = $_SESSION['user']['id'];

        $keys = array_keys($post);
        $sqlKeys = [];
        foreach ($keys as $key => $val) {
            $sqlKeys[] = $val . "=:" . $val;
        }
        $sqlKeys = implode(',', $sqlKeys);
        $execPost = [];
        foreach ($post as $key => $data) {
            $execPost[':' . $key] = $data;
        }
        $sql = "INSERT INTO comments SET " . $sqlKeys;

        $data = $db->prepare($sql);
        $row = $data->execute($execPost);
        if ($row) {
            header('Location:index.php?page=comment&action=create&operation=true');
            die;
        }
    }
}
function getComments()
{
    global $db;
    //  $sql = 'SELECT * FROM comments LEFT JOIN users on comments.user_id= users.id';
    $sql = 'SELECT comments.id as comment_id,comments.comments, users.id as user_id, users.fullname FROM comments LEFT JOIN users on comments.user_id = users.id';

    $data = $db->prepare($sql);
    $data->execute();
    $row = $data->fetchAll(PDO::FETCH_ASSOC);
//    print_r($row);

    if (count($row) > 0) {
        return $row;
    }
}

function deleteComment ($deleteUserComment){
   
 global $db;
    $sql = 'DELETE FROM comments WHERE id=:id';
    // $sql = 'DELETE FROM comments where   user_id=:id';
    $data = $db->prepare($sql);
    $data->bindParam(':id', $deleteUserComment, PDO::PARAM_INT);
    $exec = $data->execute();
    if ($exec) {
        $loc = explode('/', $_SERVER['REQUEST_URI']);
        $loc = $loc[count($loc) - 1];
        // header('Location:index.php?page=comment&action=all&operation=true');
        // die;
 }
}
