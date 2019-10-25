<?php

    // Get user IP

    $rt_user_ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

    // Add rating

    // Add like

    if(isset($_GET['like'])){

        $rt_data_massive = [

            'rt_user_ip' => $_GET['userip'],
            'rt_likes' => 1,
            'rt_dislikes' => 0,
            'art_id' => $_GET['artid'],

        ];

        // Get rating parameters
        
        $rt_get_artid = $_GET['artid'];
        $rt_get_usrip = $_GET['userip'];

        // Select data if isset

        $rt_art_like_check_sql = "SELECT * FROM php_rt_rating WHERE art_id=:artid AND rt_user_ip=:rtuserip LIMIT 1";
        $rt_art_like_check_stmt = $db_connection->prepare($rt_art_like_check_sql);
        $rt_art_like_check_stmt->bindParam(':artid', $rt_get_artid);
        $rt_art_like_check_stmt->bindParam(':rtuserip', $rt_get_usrip);
        $rt_art_like_check_stmt->execute();
        $rt_art_like_check_fetch = $rt_art_like_check_stmt->fetch();

        if($rt_art_like_check_fetch == null){

            // If not add to DB

            $rt_art_like_upd_sql = "INSERT INTO php_rt_rating (rt_user_ip, rt_likes, rt_dislikes, art_id) VALUES (:rt_user_ip, :rt_likes, :rt_dislikes, :art_id)";
            $rt_art_like_upd_stmt = $db_connection->prepare($rt_art_like_upd_sql);
            $rt_art_like_upd_stmt->execute($rt_data_massive);

            // Redirect

            header('Location: index.php');

        }elseif($rt_art_like_check_fetch['rt_likes'] == 0 || $rt_art_like_check_fetch['rt_dislikes'] != 0){

            // If isset Like or Dislike set Like = 1 and Dislike = 0

            $rt_art_like_upd_sql = "UPDATE php_rt_rating SET rt_likes = 1, rt_dislikes = 0 WHERE art_id=:artid AND rt_user_ip=:rtuserip";
            $rt_art_like_upd_stmt = $db_connection->prepare($rt_art_like_upd_sql);
            $rt_art_like_upd_stmt->bindParam(':artid', $rt_get_artid);
            $rt_art_like_upd_stmt->bindParam(':rtuserip', $rt_get_usrip);
            $rt_art_like_upd_stmt->execute();

            // Redirect

            header('Location: index.php');

        }elseif($rt_art_like_check_fetch['rt_likes'] != 0){

            // If Like already exist set Like = 0 and Dislike = 0

            $rt_art_like_upd_sql = "UPDATE php_rt_rating SET rt_likes = 0, rt_dislikes = 0 WHERE art_id=:artid AND rt_user_ip=:rtuserip";
            $rt_art_like_upd_stmt = $db_connection->prepare($rt_art_like_upd_sql);
            $rt_art_like_upd_stmt->bindParam(':artid', $rt_get_artid);
            $rt_art_like_upd_stmt->bindParam(':rtuserip', $rt_get_usrip);
            $rt_art_like_upd_stmt->execute();

            // Redirect

            header('Location: index.php');

        }

    }

    // Add dislike

    if(isset($_GET['dislike'])){

        $rt_data_massive = [

            'rt_user_ip' => $_GET['userip'],
            'rt_likes' => 1,
            'rt_dislikes' => 0,
            'art_id' => $_GET['artid'],

        ];

        // Get rating parameters
        
        $rt_get_artid = $_GET['artid'];
        $rt_get_usrip = $_GET['userip'];

        // Select data if isset

        $rt_art_like_check_sql = "SELECT * FROM php_rt_rating WHERE art_id=:artid AND rt_user_ip=:rtuserip LIMIT 1";
        $rt_art_like_check_stmt = $db_connection->prepare($rt_art_like_check_sql);
        $rt_art_like_check_stmt->bindParam(':artid', $rt_get_artid);
        $rt_art_like_check_stmt->bindParam(':rtuserip', $rt_get_usrip);
        $rt_art_like_check_stmt->execute();
        $rt_art_like_check_fetch = $rt_art_like_check_stmt->fetch();

        if($rt_art_like_check_fetch == null){

            // If not add to DB

            $rt_art_like_upd_sql = "INSERT INTO php_rt_rating (rt_user_ip, rt_likes, rt_dislikes, art_id) VALUES (:rt_user_ip, :rt_likes, :rt_dislikes, :art_id)";
            $rt_art_like_upd_stmt = $db_connection->prepare($rt_art_like_upd_sql);
            $rt_art_like_upd_stmt->execute($rt_data_massive);

            // Redirect

            header('Location: index.php');

        }elseif($rt_art_like_check_fetch['rt_dislikes'] == 0 || $rt_art_like_check_fetch['rt_likes'] != 0){

            // If isset Like or Dislike set Like = 0 and Dislike = 1

            $rt_art_like_upd_sql = "UPDATE php_rt_rating SET rt_likes = 0, rt_dislikes = 1 WHERE art_id=:artid AND rt_user_ip=:rtuserip";
            $rt_art_like_upd_stmt = $db_connection->prepare($rt_art_like_upd_sql);
            $rt_art_like_upd_stmt->bindParam(':artid', $rt_get_artid);
            $rt_art_like_upd_stmt->bindParam(':rtuserip', $rt_get_usrip);
            $rt_art_like_upd_stmt->execute();

            // Redirect

            header('Location: index.php');

        }elseif($rt_art_like_check_fetch['rt_dislikes'] != 0){

            // If Like already exist set Like = 0 and Dislike = 0

            $rt_art_like_upd_sql = "UPDATE php_rt_rating SET rt_likes = 0, rt_dislikes = 0 WHERE art_id=:artid AND rt_user_ip=:rtuserip";
            $rt_art_like_upd_stmt = $db_connection->prepare($rt_art_like_upd_sql);
            $rt_art_like_upd_stmt->bindParam(':artid', $rt_get_artid);
            $rt_art_like_upd_stmt->bindParam(':rtuserip', $rt_get_usrip);
            $rt_art_like_upd_stmt->execute();

            // Redirect

            header('Location: index.php');

        }

    }
    
    // Select all articles
    
    $rt_art_list_sql = "SELECT * FROM php_rt_articles ORDER BY art_date DESC";
    $rt_art_list_stmt = $db_connection->prepare($rt_art_list_sql);
    $rt_art_list_stmt->execute();

    // Cicles

    while($rt_art_list_fetch = $rt_art_list_stmt->fetch()){

        $rt_art_id = $rt_art_list_fetch['id'];
        
        $rt_art_rating_sql = "SELECT SUM(rt_likes), SUM(rt_dislikes) FROM php_rt_rating WHERE art_id=:artid";
        $rt_art_rating_stmt = $db_connection->prepare($rt_art_rating_sql);
        $rt_art_rating_stmt->bindParam(':artid', $rt_art_id);
        $rt_art_rating_stmt->execute();

        while($rt_art_rating_fetch = $rt_art_rating_stmt->fetch()){
        
            $rt_art_data = '<div class="jumbotron jumbotron-container">';
            $rt_art_data .= '<h1>' . $rt_art_list_fetch['art_name'] . ' <small>' . $rt_art_list_fetch['art_date'] . '</small></h1>';
            $rt_art_data .= '<p>' . $rt_art_list_fetch['art_text'] . '</p>';
            $rt_art_data .= '<a href="index.php?artid=' . $rt_art_list_fetch['id'] . '&userip=' . $rt_user_ip . '&like"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> ' . $rt_art_rating_fetch['SUM(rt_likes)'] . '</a> ';
            $rt_art_data .= '<a href="index.php?artid=' . $rt_art_list_fetch['id'] . '&userip=' . $rt_user_ip . '&dislike"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> ' . $rt_art_rating_fetch['SUM(rt_dislikes)'] . '</a>';
            $rt_art_data .= '</div>';

            echo $rt_art_data;

        }

    }
    echo $rt_art_like_check_fetch['rt_likes'];

?>