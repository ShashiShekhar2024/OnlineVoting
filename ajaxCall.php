<?php 
//echo "Working Like"
require_once "dbconn.php";
if (isset($_POST['e_id']) && isset($_POST['c_id']) && isset($_POST['v_id'])) 
{
    $vote_date = date("Y-m-d"); 
    $vote_time = date("h:i:s a"); 
    $query = "INSERT INTO tbl_voting (election_id, voters_id, condidate_id, vote_date, vote_time) VALUES ('" . $_POST['e_id'] . "', '" . $_POST['c_id'] . "', '" . $_POST['v_id'] . "', '" . $vote_date . "', '" . $vote_time . "')"; 
    if (mysqli_query($conn, $query)) { 
        echo "success"; 
    } 
        else { 
            die("Error: " . mysqli_error($conn));
        }
}

?>