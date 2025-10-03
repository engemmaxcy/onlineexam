<?php

$totalExaminee = $conn->query("SELECT COUNT(*) as total FROM examinee_tbl")->fetch(PDO::FETCH_ASSOC)['total'];
$totalFeedback = $conn->query("SELECT COUNT(*) as feedback FROM feedbacks_tbl")->fetch(PDO::FETCH_ASSOC)['feedback'];
?>

<div class="app-main__outer">
    <div id="refreshData">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Dashboard
                            <div class="page-title-subheading">
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                            <i class="fa fa-star"></i>
                        </button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Course</div>
                        <div class="widget-subheading" style="color:transparent;">.</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span><?php echo $totalCourse = $selCourse['totCourse']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Exam</div>
                        <div class="widget-subheading" style="color:transparent;">.</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span><?php echo $totalCourse = $selExam['totExam']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Examinee</div>
                        <div class="widget-subheading" style="color:transparent;">.</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span><?php echo $totalExaminee; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-6 col-xl-4">
           <div class="card mb-3 widget-content bg-white">
                <div class="widget-content-wrapper text-dark">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Feedback</div>
                        <div class="widget-subheading" style="color:transparent;">.</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-brown">
                            <span><?php echo $totalFeedback; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- <?php include("includes/graph.php"); ?> -->


    </div>

</div>