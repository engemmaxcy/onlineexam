<?php
include("../../../conn.php");
$id = $_GET['id'];

$selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
   <div class="card shadow-lg border-0 rounded-lg">
      <div class="card-header bg-primary text-white">
         <h5 class="mb-0">
            <i class="edit large icon"></i> Update
            <b>( <?php echo strtoupper($selExmne['exmne_fullname']); ?> )</b>
         </h5>
      </div>
      <div class="card-body">
         <form method="post" id="updateExamineeFrm">
            <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">

            <div class="mb-3">
               <label class="form-label">Fullname</label>
               <input type="text" name="exFullname" class="form-control" required
                  value="<?php echo $selExmne['exmne_fullname']; ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Gender</label>
               <select class="form-select" name="exGender">
                  <option value="<?php echo $selExmne['exmne_gender']; ?>">
                     <?php echo $selExmne['exmne_gender']; ?>
                  </option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
               </select>
            </div>

            <div class="mb-3">
               <label class="form-label">Contact</label>
               <input type="text" name="exContact" class="form-control" required
                  value="<?php echo $selExmne['exmne_contact']; ?>" />
            </div>

            <div class="mb-3">
               <label class="form-label">Course</label>
               <?php
               $exmneCourse = $selExmne['exmne_course'];
               $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
               ?>
               <select class="form-select" name="exCourse">
                  <option value="<?php echo $exmneCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
                  <?php
                  $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id!='$exmneCourse' ");
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php  }
                  ?>
               </select>
            </div>

            <div class="mb-3">
               <label class="form-label">Year level</label>
               <input type="text" name="exYrlvl" class="form-control" required
                  value="<?php echo $selExmne['exmne_year_level']; ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Email</label>
               <input type="email" name="exEmail" class="form-control" required
                  value="<?php echo $selExmne['exmne_email']; ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Password</label>
               <input type="text" name="exPass" class="form-control" required
                  value="<?php echo $selExmne['exmne_password']; ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Status</label>
               <input type="hidden" name="course_id" value="<?php echo $id; ?>">
               <input type="text" name="newCourseName" class="form-control" required
                  value="<?php echo $selExmne['exmne_status']; ?>">
            </div>

            <div class="d-flex justify-content-end">
               <button type="submit" class="btn btn-primary px-4">
                  Update Now
               </button>
            </div>
         </form>
      </div>
   </div>
</div>