<div class="container-fluid">
    <div class="row my-3">
    <div class="col-4 px-5">
        <h3 class="mb-4">Add Condidates</h3>
        <form class="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="election_id">Select Select Election</label>
                <select name="election_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                    <option values="" selected>Select Election</option>
                    <?php 
                    require_once("dbconn.php");
                        $feachingElection = mysqli_query($conn, "SELECT * FROM `tbl_election` ORDER BY `id` DESC") or die (mysqli_query($conn));
                        $isAnyElectionAdded = mysqli_num_rows($feachingElection);
                        if ($isAnyElectionAdded > 0) {
                            while ($row = mysqli_fetch_assoc($feachingElection)) {
                                $election_id = $row['id'];
                                $elcetion_name = $row['election_topic'];
                                
                                ?>
                                 <option value='<?php echo $election_id ?>'><?php echo $elcetion_name ?></optoon>

                                <?php
                            }
                        }
                        else {
                            ?>
                            <option value="">Please add elcection</optoon>

                        <?php
                        }
                    ?>

                </select>
            </div>
            <div class="form-group mb-3">
                <label for="condidatesName"> Condidates Name</label>
                <input type="text" class="form-control" name="condidatesName" id="condidatesName" placeholder="Condidates Name" required/>
            </div>
            <div class="form-group mb-3">
                <label for="condidates_Photo"> Condidates Photo </label>
                <input type="file" class="form-control" name="condidates_Photo" id="condidates_Photo" required/>
            </div>
            <div class="form-group mb-3">
                <label for="condidatesDeatils"> Condidates Details</label>
                <input type="text" class="form-control" name="condidatesDeatils" id="condidatesDeatils" placeholder="Condidates Details" required/>
            </div>
            
            <button type="submit" class="btn btn-success" name="addCondidates">Add Condidates</button>
        </form>
    </div>
    <div class="col-8 px-5">
        <h3 class="mb-4">Condidates Details</h3>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">S.no</th>
              <th scope="col">Condidates Photo</th>
              <th scope="col">Condidates Name</th>
              <th scope="col">Condidates Details</th>
              <th scope="col">Condidates ID</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            include "dbconn.php";
            $query = "SELECT election_id, condidate_name, condidate_details, condidate_photo FROM tbl_createcondidates";
            $fetchData = mysqli_query($conn, $query) or die("Unable to fetch the values");
            $isAnyElectionAdded = mysqli_num_rows($fetchData);

            if ($isAnyElectionAdded > 0) {
                $sl = 1;
                while ($row = mysqli_fetch_assoc($fetchData)) {
            ?>
        <tr>
            <td><?php echo $sl++; ?></td>
            <td><img src='<?php echo $row['condidate_photo']; ?>' class="brand_logo" alt="Logo"> </td>
            <td><?php echo $row['condidate_name']; ?></td>
            <td><?php echo $row['condidate_details']; ?></td>
            <td><?php echo $row['election_id']; ?></td>
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
        if(isset($_POST['addCondidates'])){
            $election_id = $_POST['election_id'];
            $condidatesName = $_POST['condidatesName'];
            $condidatesDeatils = $_POST['condidatesDeatils'];

            //photo
            $targated_folder ="../assets/images/condidates_photo/"; //echo $targated_folder;
            $condidates_Photo = $targated_folder . rand(11111, 99999). $_FILES['condidates_Photo']['name'];
            $condidatesPhoto_temp_name = $_FILES['condidates_Photo']['tmp_name'];
            $condidatesPhoto_type = strtolower(pathinfo($condidates_Photo, PATHINFO_EXTENSION));
            $allow_type = array("jpg", "png", "jpeg"); 
            $image_size = $_FILES['condidates_Photo']['size'];
            if ($image_size > 2000 ) {
                if (in_array($condidatesPhoto_type, $allow_type)) {
                    if (move_uploaded_file($condidatesPhoto_temp_name, $condidates_Photo)) {
                        mysqli_query($conn, "INSERT INTO tbl_createcondidates(election_id, condidate_name, condidate_details, condidate_photo) VALUES ('".$election_id."', '".$condidatesName."', '".$condidatesDeatils."', '".$condidates_Photo."')") or die(mysqli_error($conn));
                        echo "<span>File Inserted Sucessfull<span>";
                    }
                    else {
                        echo "File Not added";
                    }
                }
                else {
                   echo "COnditae photo";
                }
            }
            else {
                echo "some issue";
            }
        }
        else {
            # code...
        }
            
    ?>
</div>
</div>