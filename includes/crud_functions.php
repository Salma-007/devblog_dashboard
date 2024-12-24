<?php 
include('../config/database.php');
function connect_db(){
    $con = mysqli_connect(
        $_ENV['DB_SERVER'], 
        $_ENV['DB_USERNAME'], 
        $_ENV['DB_PASSWORD'], 
        $_ENV['DB_NAME']
    );

    // Vérifier si la connexion est réussie
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $con;  // Retourner l'objet de connexion
}

function get_all_articles($mysqli){
    $query = "select articles.title, users.username as author_name, categories.name as category_name from articles 
    join categories on articles.category_id= categories.id
    join users on articles.author_id = users.id;";
    $result = mysqli_query($mysqli,$query);
    if($result){
        return mysqli_fetch_assoc($result);
    }
}

function get_category_stats($mysqli){

}

function get_top_users($mysqli){
    $query = "select * from users ";


}

function get_top_articles($mysqli){
    
}

function getTableCount($mysqli, $articles){
    $query = "select count(*) as count from $articles";
    $result = mysqli_query($mysqli,$query);
    if($result){
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }
    
}



?>