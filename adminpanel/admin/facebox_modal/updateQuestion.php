<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selCourse = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$id' ")->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-4" style="max-width:600px;">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <i class="bi bi-pencil-square"></i> Update Question
    </div>
    <div class="card-body">
      <form method="post" id="updateQuestionFrm">
        <input type="hidden" name="question_id" value="<?php echo $id; ?>">

        <div class="mb-3">
          <label for="question" class="form-label">Question</label>
          <textarea name="question" id="question" class="form-control" rows="3" required><?php echo $selCourse['exam_question']; ?></textarea>
        </div>

        <div class="mb-3">
          <label for="exam_ch1" class="form-label">Choice A</label>
          <input type="text" name="exam_ch1" id="exam_ch1" value="<?php echo $selCourse['exam_ch1']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="exam_ch2" class="form-label">Choice B</label>
          <input type="text" name="exam_ch2" id="exam_ch2" value="<?php echo $selCourse['exam_ch2']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="exam_ch3" class="form-label">Choice C</label>
          <input type="text" name="exam_ch3" id="exam_ch3" value="<?php echo $selCourse['exam_ch3']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="exam_ch4" class="form-label">Choice D</label>
          <input type="text" name="exam_ch4" id="exam_ch4" value="<?php echo $selCourse['exam_ch4']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="exam_final" class="form-label text-success">Correct Answer</label>
          <input type="text" name="exam_final" id="exam_final" value="<?php echo $selCourse['exam_answer']; ?>" class="form-control" required>
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-primary btn-sm">Update Now</button>
        </div>
      </form>
    </div>
  </div>
</div>
