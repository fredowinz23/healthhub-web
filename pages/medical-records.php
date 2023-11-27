<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $patientId = $_GET["patientId"];
  $mr_list = medical_record()->list("patientId=$patientId");
  $patient = patient()->get("Id=$patientId");
?>

<br>


      <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Medical records of <?=$patient->fullName;?></h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted " href="">Records</a></li>
                  <li class="breadcrumb-item" aria-current="page">Medical Records</li>
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
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
              <a href="medical-exam-form.php?patientId=<?=$patientId;?>" class="btn btn-info d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Add New Record
              </a>
            </div>
          </div>
        </div>

        <div class="card card-body">
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>#</th>
                <th>Date</th>
                <th>Reason for admission</th>
                <th>Doctor</th>
                <th>Status</th>
                <th width="10%">Action</th>
              </thead>
              <tbody>
                <!-- start row -->

                <?php
                $count = 0;
                foreach ($mr_list as $row):
                  $doctor = account()->get("Id=$row->doctorId");
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
                                ><?=$doctor->firstName;?> <?=$doctor->lastName;?></h6>
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
                        <a href="process.php?action=check-out&patientId=<?=$patientId?>&mrId=<?=$row->Id?>" class="btn btn-warning">Discharge</a>
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
