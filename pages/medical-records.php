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

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h3>Patient Information</h3>

                <b>Patient Name:</b>
                <?=$patient->fullName?> <br>
                  <b>Date Of Birth:</b>
                  <?=$patient->dob?> <br>
                    <b>gender:</b>
                    <?=$patient->gender?> <br>
            </div>

              <div class="col-6">
                <h3>Contact Information</h3>
                  <b>Address:</b>
                  <?=$patient->address?> <br>

                    <b>City:</b>
                    <?=$patient->city?> <br>
                      <b>Phone Number:</b>
                      <?=$patient->phoneNumber?> <br>

                        <b>Email address:</b>
                        <?=$patient->email?> <br>
              </div>

              <div class="col-6">
                <h3>Emergency Contact</h3>

                  <b>Name:</b>
                  <?=$patient->emergencyContactName?> <br>

                    <b>Relationship:</b>
                    <?=$patient->relationship?> <br>

                      <b>Phone Number:</b>
                      <?=$patient->emergencyPhoneNumber?> <br>
              </div>

              <div class="col-6">
                <h3>Insurance Information</h3>

                  <b>INsurance Provider:</b>
                  <?=$patient->insuranceProvider?> <br>

                    <b>Policy Number:</b>
                    <?=$patient->policyNumber?> <br>

                      <b>Group Number:</b>
                      <?=$patient->groupNumber?> <br>

                        <b>Benefactor:</b>
                        <?=$patient->subscriberName?> <br>

                          <b>Birthday:</b>
                          <?=$patient->subscriberDob?> <br>

                            <b>ID:</b>
                            <?=$patient->subscriberId?> <br>

                              <b>Admittion Status:</b>
                              <?=$patient->status?>
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
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Record..." />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
              <a href="medical-exam-form.php?patientId=<?=$patientId;?>" class="btn btn-info d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Add New Medical Record
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
                <th>Purpose</th>
                <th>Doctor</th>
                <th>Orders</th>
                <th>Status</th>
                <th width="10%">Action</th>
              </thead>
              <tbody>
                <!-- start row -->

                <?php
                $count = 0;
                foreach ($mr_list as $row):
                  $doctor = account()->get("Id=$row->doctorId");
                  $specialty = specialty()->get("Id=$doctor->drSpecialtyId");
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
                                >Dr. <?=$doctor->firstName;?> <?=$doctor->lastName;?> (<?=$specialty->name?>)</h6>
                              </div>
                            </div>
                          </div>
                        </td>

                          <td>
                            <div class="d-flex align-items-center">
                              <div class="ms-3">
                                <div class="user-meta-info">
                                  <h6 class="user-name mb-0"
                                  ><?=$row->doctorsOrders;?></h6>
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
