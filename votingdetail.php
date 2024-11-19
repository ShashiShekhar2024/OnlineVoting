<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Voting</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/png"  href="assets/images/favicon-32x32.png" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/votingdetail.css" rel="stylesheet" type="text/css" />
</head>
  <body>
<div class="container-fluid">
<div class="row header-bg flex-md-nowrap shadow">
  <div class="col-12">
          <header class="navbar navbar-dark sticky-top  p-0 ">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
          <img src="assets/images/voting.gif" class="brand_logo" alt="Logo" style="
          width: 45px;"> Onlie Voting application </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <div class="row">
              <div class="col-3">
                <span><?php echo $username ?></span>
              </div>
              <div class="col-1">
                <span><a class="nav-link px-3" href="logout.php">Logout</a></span>
              </div>
            </div>
          </div>
        </div>
      </header>
  </div>
</div>
  <div class="row">
   

    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Voting Area</h1>
      </div>

      <div class="col-12">
        <?php
          require_once "dbconn.php";
          $feachingActiveElection = mysqli_query($conn, "SELECT * FROM `tbl_election` WHERE status = 'Active'") or die (mysqli_query($conn));
          $totalActiveElection = mysqli_num_rows($feachingActiveElection);
          if ($totalActiveElection > 0) {
            while ($data = mysqli_fetch_assoc($feachingActiveElection)) {
              $election_id = $data['id']; //echo $election_id;
              $elcetion_topic = $data['election_topic'];
              ?>
              <div class="row">
                <div class="col-12">
                  Election Topic <?php echo strtoupper($elcetion_topic); ?>
                </div>
              </div>
               <div class="row table-responsive">
                <div class="col-12">
                   <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Condidates Details</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Avtion</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
              
                  $fetchingCandidateDetails = mysqli_query($conn, "SELECT * FROM tbl_createcondidates WHERE election_id ='". $election_id ."'") or die (mysqli_error($conn));
                  //$totalActiveElectionDetails = mysqli_num_rows($fetchingCandidateDetails);
                  //print_r($fetchingCandidateDetails);
                  while($candidateData = mysqli_fetch_assoc($fetchingCandidateDetails)) {
                      $candidate_id = $candidateData['id'];  
                      //echo $candidate_id;
                      $condidate_photo = $candidateData['condidate_photo'];
                      // echo $candidate_photo;
                      //echo $condidate_photo;
                      $url = $condidate_photo;
                      $cleanedUrl = str_replace("../", "", $url);

                      //voting
                      $fachingVote = mysqli_query($conn, "SELECT * FROM tbl_voting WHERE condidate_id= '". $candidate_id ."'") or die (mysqli_error($conn));
                      $totalVote = mysqli_num_rows($fachingVote);
                      ?>
                      <tr>
                        <td><img src='<?php echo $cleanedUrl ?>' class="brand_logo" alt="Logo" width="50px"></td>
                        <td><?php echo "<b>" . $candidateData['condidate_name'] . "</b><br/>" . $candidateData['condidate_details']; ?> </td>
                        <td><?php echo $totalVote ?></td>
                        <td> 
                         <?php 
                            require_once "dbconn.php";

                            if (isset($_POST['e_id']) && isset($_POST['c_id']) && isset($_POST['v_id'])) {
                                $vote_date = date("Y-m-d");
                                $vote_time = date("h:i:s a");

                                $query = "INSERT INTO tbl_voting (election_id, voters_id, condidate_id, vote_date, vote_time) VALUES ('" . $_POST['e_id'] . "', '" . $_POST['c_id'] . "', '" . $_POST['v_id'] . "', '" . $vote_date . "', '" . $vote_time . "')";
                                
                                if (mysqli_query($conn, $query)) {
                                    echo "success";
                                } else {
                                    die("Error: " . mysqli_error($conn));
                                }
                            }

                            $checkUserVotCasted = mysqli_query($conn, "SELECT * FROM tbl_voting WHERE voters_id= '". $_SESSION['id'] ."' AND election_id = '". $election_id ."'") or die (mysqli_error($conn));
                            $isUserVotcasted = mysqli_num_rows($checkUserVotCasted);

                            if ($isUserVotcasted > 0) {                              
                                ?>
                                <img src="assets/images/voted.png" width="40px" alt="Logo">
                                <?php
                            } else {
                                ?>
                                <button type="button" class="btn btn-success" onclick="castVote(<?php echo $election_id; ?>, <?php echo $candidate_id;?>, <?php echo $_SESSION['id'];?>);">Voting</button>
                                <?php
                            }
                            ?>

                          
                        </td>
                      </tr>

                      <?php
                  }
                ?>
                 </tbody>
                </table>
                </div>
              </div>
              <?php
            }
          }
          else {
            echo "No active election";
          }
        ?>
        
      </div>
    </main>
  </div>
  <?php require_once("admin/footer.php");?>
</div>

<script language="javascript" type="text/javascript" src="assets/js/jquery-3.7.1.min.js"></script>
<script language="javascript" type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script>
    const castVote = (election_id, customer_id, vote_id) => {
    
      //console.log(e_id + " - "+ c_id + " - " + v_id );

      $.ajax({ 
        type: "POST", url: "ajaxCall.php", data: "e_id=" + election_id + "&c_id=" + customer_id + "&v_id=" + vote_id, 
        success: function (response) { 
          console.log(response); 
          if(response == "success"){
           // location.assign("login.php?voteCasted=1");
          }
          else{
            //location.assign("login.php?voteNotCasted=1");
          }
        } 
      });
    }
  </script>
  </body>
</html>
