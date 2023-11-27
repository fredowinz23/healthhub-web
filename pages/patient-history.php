<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $status = get_query_string("status", "Admitted");
  $mr_list = medical_record()->list("status='$status'");

$admittedActive = "";
$clearActive = "";
if ($status=="Admitted") {
  $admittedActive = "active";
}
if ($status=="Discharged") {
  $clearActive = "active";
}

?>

<br>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?=$admittedActive?>" href="?status=Admitted">Admitted</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$clearActive?>" href="?status=Discharged">Discharged</a>
  </li>
</ul>

      <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Patient History</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted " href="">Records</a></li>
                  <li class="breadcrumb-item" aria-current="page">Patient History</li>
                </ol>
              </nav>
            </div>
            <div class="col-3">
              <div class="text-center mb-n5">
                <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="widget-content searchable-container list">
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
          <div class="row">
            <div class="col-md-4 col-xl-3">
              <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Patient..." />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
          </div>
        </div>

        <div class="card card-body">
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>#</th>
                <th>Date</th>
                <th>Patient</th>
                <th>Reason for admission</th>
                <th>Doctor</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
                <!-- start row -->

                <?php
                $count = 0;
                foreach ($mr_list as $row):
                  $doctor = account()->get("Id=$row->doctorId");
                  $patient = patient()->get("Id=$row->patientId");
                  $count += 1;
                   ?>

                <tr class="search-items">
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <div class="user-meta-info">
                          <h6 class="user-name mb-0"
                          ><?=$count;?></h6>
                        </div>
                      </div>
                    </div>
                  </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="ms-3">
                          <div class="user-meta-info">
                            <h6 class="user-name mb-0"
                            ><?=$row->dateAdded;?></h6>
                          </div>
                        </div>
                      </div>
                    </td>

                      <td>
                        <div class="d-flex align-items-center">
                          <div class="ms-3">
                            <div class="user-meta-info">
                              <h6 class="user-name mb-0"
                              ><?=$patient->fullName;?></h6>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex align-items-center">
                          <div class="ms-3">
                            <div class="user-meta-info">
                              <h6 class="user-name mb-0"
                              ><?=$row->reasonForAdmission;?></h6>
                            </div>
                          </div>
                        </div>
                      </td>

                        <td>
                          <div class="d-flex align-items-center">
                            <div class="ms-3">
                              <div class="user-meta-info">
                                <h6 class="user-name mb-0"
                                >Dr. <?=$doctor->firstName;?> <?=$doctor->lastName;?></h6>
                              </div>
                            </div>
                          </div>
                        </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <div class="ms-3">
                                <div class="user-meta-info">
                                  <h6 class="user-name mb-0"
                                  ><?=$row->status;?></h6>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="action-btn">
                              <?php if ($row->status=="Admitted" && $role=="Doctor"): ?>
                                <a href="process.php?action=check-out&patientId=<?=$patient->Id?>&mrId=<?=$row->Id?>" class="btn btn-warning">Discharge</a>
                              <?php endif; ?>
                              <a href="monitoring-list.php?mrId=<?=$row->Id;?>" class="btn btn-primary">
                                View Monitoring
                              </a>
                            </div>
                          </td>

                </tr>
                <!-- end row -->

              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <?php include $ROOT_DIR . "templates/footer.php"; ?>

      <script src="<?=$ROOT_DIR;?>pages/js/accounts.js"></script>
