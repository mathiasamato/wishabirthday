<?php

function Get_random_users($nb_users = 15)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM Users WHERE id=RAND()*100 LIMIT :NBUSERS ';

        if ($ps == null) {
            $ps = db_connect()->prepare($sql);
        }
        $answer = false;

        $ps->bindParam(':NBUSERS', $nb_users, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer[0];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function Get_users_with_birthday_today()
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE `datebirth`=:CURRENTDATE';

        if ($ps == null) {
            $ps = db_connect()->prepare($sql);
        }

        $answer = false;

        $ps->bindParam(':CURRENTDATE', date("YYYY-MM-DD"), PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer[0];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function Get_users_by_id($id)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE `id`=:ID';

        if ($ps == null) {
            $ps = db_connect()->prepare($sql);
        }
        $answer = false;

        $ps->bindParam(':ID', $id, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer[0];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function Get_users_by_email($email)
{
    try {

        static $ps = null;
        $sql = 'SELECT * FROM `Users` WHERE `email`=:EMAIL';

        if ($ps == null) {
            $ps = db_connect()->prepare($sql);
        }
        $answer = false;

        $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);

        if ($ps->execute()) {
            $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answer[0];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
