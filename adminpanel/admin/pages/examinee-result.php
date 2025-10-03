<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>EXAMINEE RESULT REPORT</div>
                </div>
            </div>
        </div>        

        <div class="col-md-12" id="printableReport">
            <div class="main-card mb-3 card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <span>Examinee Results</span>
                    <span class="d-none d-print-block">Printed on: <?php echo date("d M Y, H:i"); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-bordered table-striped table-hover" id="tableList">
                        <thead class="table-light">
                            <tr>
                                <th>Fullname</th>
                                <th>Exam Name</th>
                                <th>Scores</th>
                                <th>Percentages</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $selExmne = $conn->query("SELECT * FROM examinee_tbl et 
                            INNER JOIN exam_attempt ea ON et.exmne_id = ea.exmne_id 
                            ORDER BY ea.examat_id DESC ");

                        if ($selExmne && $selExmne->rowCount() > 0) {
                            while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { 
                                $eid = $selExmneRow['exmne_id'];

                                // Get exam details for this examinee
                                $selExName = $conn->query("SELECT * FROM exam_tbl et 
                                    INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id 
                                    WHERE ea.exmne_id = '$eid' ")->fetch(PDO::FETCH_ASSOC);

                                if ($selExName) {
                                    $exam_id    = $selExName['ex_id'];
                                    $exam_title = $selExName['ex_title'];
                                    $over       = $selExName['ex_questlimit_display'];
                                } else {
                                    $exam_id    = 0;
                                    $exam_title = "No Result Found";
                                    $over       = 0;
                                }

                                // Get correct answers count
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt 
                                    INNER JOIN exam_answers ea 
                                    ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  
                                    WHERE ea.axmne_id = '$eid' 
                                    AND ea.exam_id = '$exam_id' 
                                    AND ea.exans_status = 'new' ");

                                $score = $selScore ? $selScore->rowCount() : 0;

                                // Prevent division by zero
                                $ans = ($over > 0) ? ($score / $over) * 100 : 0;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($selExmneRow['exmne_fullname']); ?></td>
                                <td><?php echo htmlspecialchars($exam_title); ?></td>
                                <td><?php echo "$score / $over"; ?></td>
                                <td><?php echo number_format($ans, 2) . "%"; ?></td>
                            </tr>
                        <?php } 
                        } else { ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">No Examinee Found</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-end p-3 no-print">
                    <button class="btn btn-primary" onclick="window.print()">Print Report / Save as PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Hide buttons in print */
@media print {
    .no-print {
        display: none !important;
    }
    body * {
        visibility: hidden;
    }
    #printableReport, #printableReport * {
        visibility: visible;
    }
    #printableReport {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
}
</style>
