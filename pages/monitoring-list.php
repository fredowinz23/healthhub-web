<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $mrId = $_GET["mrId"];
  $monitoring_list = follow_up()->list("mrId=$mrId");
  $mr = medical_record()->get("Id=$mrId");
  $patient = patient()->get("Id=$mr->patientId");
  $doctor = account()->get("Id=$mr->doctorId");
  $symptom = symptom()->get("Id=$mr->symptomId");
  $dep = department()->get("Id=$doctor->departmentId");
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <br>
      <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Monitoring</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted " href="">Records</a></li>
                  <li class="breadcrumb-item" aria-current="page">Monitoring and follow ups</li>
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

      <div class="card">
        <div class="card-body">

            <h4>Medical Records</h4>
          <div class="row">
            <div class="col-6">
                <b>Doctor:</b> Dr. <?=$doctor->firstName?> <?=$doctor->lastName?> <br>
                <b>Department:</b> <?=$dep->name?> <br>
                <b>Room:</b> <?=$mr->room?> <br>
                <b>Reason for admission:</b> <?=$mr->reasonForAdmission?> <br>
                <b>Allergies:</b> <?=$mr->allergies?> <br>
            </div>
            <div class="col-6">

              <b>Medications:</b> <?=$mr->medications?> <br>
              <b>Blood Type:</b> <?=$mr->bloodType?> <br>
              <b>Symptoms:</b> <?=$symptom->name?> <br>
              <b>Doctor's Order:</b> <?=$mr->doctorsOrders?> <br>
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
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Monitoring..." />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
              <a href="monitoring-form.php?mrId=<?=$mrId;?>" class="btn btn-info d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Add New Follow up Monitoring
              </a>
            </div>
          </div>
        </div>


<div class="row">
  <div class="col-4">
    <div class="card">
      <div class="card-body">

      </div>
    </div>
  </div>
</div>


        <div class="card card-body">
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>#</th>
                <th>Date</th>
                <th>Time</th>
                <th>Progress Notes</th>
                <th>Monitored by</th>
                <th>View</th>
              </thead>
              <tbody>
                <!-- start row -->

                <?php
                $count = 0;
                foreach ($monitoring_list as $row):
                  $mon = account()->get("Id=$row->monitoredBy");
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
                              ><?=$row->timeAdded;?></h6>
                            </div>
                          </div>
                        </div>
                      </td>


                          <td>
                            <div class="d-flex align-items-center">
                              <div class="ms-3">
                                <div class="user-meta-info">
                                  <h6 class="user-name mb-0"
                                  ><?=$row->observations;?></h6>
                                </div>
                              </div>
                            </div>
                          </td>

                                <td>
                                  <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                      <div class="user-meta-info">
                                        <h6 class="user-name mb-0"
                                        ><?=$mon->firstName;?> <?=$mon->lastName;?></h6>
                                      </div>
                                    </div>
                                  </div>
                                </td>

                              <td>
                                <a href="monitoring-detail.php?Id=<?=$row->Id?>" class="btn btn-primary">View Detail</a>
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
