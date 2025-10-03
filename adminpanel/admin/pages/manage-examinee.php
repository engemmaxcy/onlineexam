
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- DataTables Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
</head>

<body>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE EXAMINEE</div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee List</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Course</th>
                                    <th>Year level</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $selExmne = $conn->query("SELECT exmne_id, exmne_fullname, exmne_gender, exmne_contact, exmne_course, exmne_year_level, exmne_email, exmne_password, exmne_status FROM examinee_tbl ORDER BY exmne_id DESC");

                                if ($selExmne->rowCount() > 0) {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td><?= $selExmneRow['exmne_fullname']; ?></td>
                                            <td><?= $selExmneRow['exmne_gender']; ?></td>
                                            <td><?= $selExmneRow['exmne_contact']; ?></td>
                                            <td>
                                                <?php
                                                $exmneCourse = $selExmneRow['exmne_course'];
                                                $selCourse = $conn->query("SELECT cou_name FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                echo $selCourse['cou_name'];
                                                ?>
                                            </td>
                                            <td><?= $selExmneRow['exmne_year_level']; ?></td>
                                            <td><?= $selExmneRow['exmne_email']; ?></td>
                                            <td><?= $selExmneRow['exmne_password']; ?></td>
                                            <td><?= $selExmneRow['exmne_status']; ?></td>
                                            <td>
                                                <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?= $selExmneRow['exmne_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                                <a href="deleteExaminee.php?id=<?= $selExmneRow['exmne_id']; ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this examinee?');">
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="9">
                                            <h3 class="p-3">No Course Found</h3>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableList').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm btn-outline-primary'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-outline-success'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-sm btn-outline-danger'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-outline-dark'
                    },
                    {
                        extend: 'colvis',
                        className: 'btn btn-sm btn-outline-secondary'
                    }
                ],
                pageLength: 10,
                responsive: true
            });
        });
    </script>
</body>