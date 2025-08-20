<?php
require_once("Database.php");

class Reserve extends Database {

    // すべての予約取得
    public function select() {
        $sql = "SELECT * FROM reservations
                INNER JOIN users ON reservations.user_id = users.user_id
                INNER JOIN moviecinema ON reservations.moci_id = moviecinema.moci_id
                INNER JOIN movies ON moviecinema.movie_id = movies.movie_id
                INNER JOIN cinemas ON moviecinema.cinema_id = cinemas.cinema_id";
        $result = $this->conn->query($sql);

        $rows = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return false;
    }

    // 予約IDで1件取得
    public function selectOne($reserve_id) {
        $stmt = $this->conn->prepare("SELECT * FROM reservations WHERE reserve_id = ?");
        $stmt->bind_param("i", $reserve_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }

    // pending予約のみ取得
    public function selectStatus() {
        $sql = "SELECT * FROM reservations
                INNER JOIN users ON reservations.user_id = users.user_id
                INNER JOIN moviecinema ON reservations.moci_id = moviecinema.moci_id
                INNER JOIN movies ON moviecinema.movie_id = movies.movie_id
                INNER JOIN cinemas ON moviecinema.cinema_id = cinemas.cinema_id
                WHERE reservestatus = 'pending'";
        $result = $this->conn->query($sql);

        $rows = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return false;
    }

    // 映画館・日時で予約情報取得
    public function getMoviesByDate($schedule, $cinemaid) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM reservations
             INNER JOIN moviecinema ON reservations.moci_id = moviecinema.moci_id
             WHERE (moviecinema.start_date >= ? OR moviecinema.end_date >= ?)
             AND moviecinema.cinema_id = ?"
        );
        $stmt->bind_param("ssi", $schedule, $schedule, $cinemaid);
        $stmt->execute();
        $result = $stmt->get_result();

        $rows = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return false;
    }

    // 予約作成
    public function store($user_id, $movie_id, $cinema_id, $quantity, $schedule) {
        // まず moviecinema 取得
        $stmt = $this->conn->prepare(
            "SELECT * FROM moviecinema WHERE cinema_id = ? AND movie_id = ?"
        );
        $stmt->bind_param("ii", $cinema_id, $movie_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result || $result->num_rows == 0) {
            return false; // 映画・映画館の組み合わせなし
        }

        $row = $result->fetch_assoc();
        $moci_id = $row['moci_id'];
        $mc_quantity = $row['mc_quantity'];
        $price = $row['price'];

        if ($mc_quantity < $quantity) {
            return false; // 在庫不足
        }

        $new_quantity = $mc_quantity - $quantity;
        $total = $price * $quantity;

        // 在庫更新
        $stmt = $this->conn->prepare(
            "UPDATE moviecinema SET mc_quantity = ? WHERE moci_id = ?"
        );
        $stmt->bind_param("ii", $new_quantity, $moci_id);
        $stmt->execute();

        // 予約作成
        $stmt = $this->conn->prepare(
            "INSERT INTO reservations(user_id, moci_id, reservestatus, quantity, total, schedule)
             VALUES (?, ?, 'pending', ?, ?, ?)"
        );
        $stmt->bind_param("iiids", $user_id, $moci_id, $quantity, $total, $schedule);

        if ($stmt->execute()) {
            $reserve_id = $this->conn->insert_id;
            header("Location: confirmreserve.php?id=$reserve_id");
            exit;
        } else {
            return $this->conn->error;
        }
    }

    // 予約ステータス更新
    public function update($reserve_id) {
        $stmt = $this->conn->prepare(
            "UPDATE reservations SET reservestatus = 'confirm' WHERE reserve_id = ?"
        );
        $stmt->bind_param("i", $reserve_id);

        if ($stmt->execute()) {
            header("Location: pendingreserve.php");
            exit;
        } else {
            return $this->conn->error;
        }
    }

    // 予約削除
    public function delete($reserve_id) {
        $stmt = $this->conn->prepare("DELETE FROM reservations WHERE reserve_id = ?");
        $stmt->bind_param("i", $reserve_id);

        if ($stmt->execute()) {
            header("Location: reservations.php");
            exit;
        } else {
            return $this->conn->error;
        }
    }
}
?>
