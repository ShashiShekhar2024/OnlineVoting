<div class="container-fluid">
    <div class="row my-3">
    <div class="col-4 px-5">
        <h3 class="mb-4">Add Election</h3>
        <form class="" method="post">
            <div class="form-group mb-3">
                <label for="electionTopic"> Election Topic</label>
                <input type="text" class="form-control" name="electionTopic" id="electionTopic" placeholder="Election Topic" require />
            </div>
            <div class="form-group mb-3">
                <label for="nameofCondidates"> Number Of Condidates </label>
                <input ttype="number" id="quantity" name="quantity" min="1" max="5" class="form-control" name="nameofCondidates" id="nameofCondidates" placeholder="Name of Condidates" require/>
            </div>
            <div class="form-group mb-3">
                <label for="startingDate"> Starting Date </label>
                <input type="text" class="form-control" name="startingDate" id="startingDate" placeholder="Starting Date" onfocus="this.type='Date'" require/>
            </div>
            <div class="form-group mb-3">
                <label for="endDate"> End Date </label>
                <input type="text" class="form-control" name="endDate" id="endDate" placeholder="End Date" onfocus="this.type='Date'" require/>
            </div>
            <button type="submit" class="btn btn-success" name="addElection">Add Election</button>
        </form>
    </div>
    <div class="col-8 px-5">
        <h3 class="mb-4">Update Election</h3>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">S.no</th>
              <th scope="col">Election Name</th>
              <th scope="col">Condidates Number</th>
              <th scope="col">Starting Date</th>
              <th scope="col">Ending Date</th>
              <th scope="col">status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
include "dbconn.php";
$query = "SELECT election_topic, no_of_condidates, starting_date, ending_date, status FROM tbl_election";
$fetchData = mysqli_query($conn, $query) or die("Unable to fetch the values");
$isAnyElectionAdded = mysqli_num_rows($fetchData);

if ($isAnyElectionAdded > 0) {
    $sl = 1;
    while ($row = mysqli_fetch_assoc($fetchData)) {
?>
        <tr>
            <td><?php echo $sl++; ?></td>
            <td><?php echo $row['election_topic']; ?></td>
            <td><?php echo $row['no_of_condidates']; ?></td>
            <td><?php echo $row['starting_date']; ?></td>
            <td><?php echo $row['ending_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <a href="#" class="btn btn-secondary">Edit</a> 
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
<?php 
    } 
} else {
    echo "No elections found.";
} 
?>

          </tbody>
        </table>
      </div>
    </div>
    <?php 
    require_once("dbconn.php");
        if(isset($_POST['addElection'])){
            $election_topic = $_POST['electionTopic'];
            $no_of_condidates = $_POST['nameofCondidates'];
            $starting_date = $_POST['startingDate'];
            $ending_date = $_POST['endDate'];
            $inser_on = date("y-m-d"); //echo $inser_on;
            $date1=date_create($inser_on);
            $date2=date_create($starting_date);
            $diff=date_diff($date1,$date2);
            if ($diff->format("%R%a") > 0) {
                $staus ="Inactive";
            }
            else {
                $staus ="Active";
            }
            //echo $diff->format("%R%a");
            //echo $starting_date;
            $sql1="insert into tbl_election(election_topic,no_of_condidates,starting_date,ending_date,status) values('$election_topic','$no_of_condidates','$starting_date','$ending_date','$staus')";
        }
       // echo $sql1;
       // $ins1=mysqli_query($conn,$sql1)or die("<p class='style1' style='height:260px'>The provided mobie no. $contactNumber already registered. pls provide a unique mobile no. for registering </p>");
            
        if ($conn->query($sql1) === TRUE)
            {
                echo "<span class='style1'>You're successfully.</span>";					
            }
            else
            {
                echo "<p class='style1'>Registration failed,<br/> Please give your proper details.</p>";
            }
        ?>
</div>
</div>