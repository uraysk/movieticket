<?php
require_once("Database.php");

class User extends Database {

    // ログイン処理
    public function login($email, $pass, $cid = null) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // パスワード検証
            if (password_verify($pass, $row['password'])) {
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['status'] = $row['status'];

                // リダイレクト
                if ($row['status'] === "admin") {
                    header("Location: Admin/admintop.php");
                    exit;
                } elseif ($row['status'] === "user") {
                    if (!$cid) {
                        header("Location: Web/toppage.php");
                    } else {
                        header("Location: Web/reserve1.php?cid=$cid");
                    }
                    exit;
                }
            } else {
                return false; // パスワード不一致
            }
        } else {
            return false; // ユーザーなし
        }
    }

    // 全件取得
    public function select() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return false;
    }

    // 1件取得
    public function selectOne($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }

    // 新規登録
    public function store($fname, $lname, $pass, $email, $status) {
        // メール重複チェック
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            return false; // すでに存在
        }

        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users(firstname, lastname, password, email, status) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $fname, $lname, $hashed, $email, $status);

        if ($stmt->execute()) {
            header("Location: users.php");
            exit;
        } else {
            return $this->conn->error;
        }
    }

    // 更新
    public function update($id, $fname, $lname, $email, $status) {
        // 他ユーザーと重複確認
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=? AND user_id != ?");
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            return false;
        }

        $stmt = $this->conn->prepare("UPDATE users SET firstname=?, lastname=?, email=?, status=? WHERE user_id=?");
        $stmt->bind_param("ssssi", $fname, $lname, $email, $status, $id);

        if ($stmt->execute()) {
            header("Location: users.php");
            exit;
        } else {
            return $this->conn->error;
        }
    }

    // 削除
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: users.php");
            exit;
        } else {
            return $this->conn->error;
        }
    }
}
?>
