<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $mr_list = medical_record()->list("status='Admitted' order by Id desc");
  $nurse_list = account()->list("role='Nurse'");
?>

<br>


      <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Current Patients</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted " href="">Nurses</a></li>
                  <li class="breadcrumb-item" aria-current="page">Current Patients</li>
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
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Record..." />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
          </div>
        </div>

        <!-- Button trigger modal -->


        <div class="card card-body">
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>#</th>
                <th>Patient</th>
                <th>Department</th>
                <th>Room</th>
                <th>Purpose</th>
                <th>Nurse</th>
                <th width="10%">Action</th>
              </thead>
              <tbody>
                <!-- start row -->

                <?php
                $count = 0;
                foreach ($mr_list as $row):
                  $patient = patient()->get("Id=$row->patientId");
                  $dep = department()->get("Id=$row->departmentId");
                  $count += 1;
                  if ($row->nurseId!="") {
                    $n = account()->get("Id=$row->nurseId");
                    $nurse = $n->firstName . " " . $n->lastName;
                  }
                  else{
                    $nurse = "<i style='color:red'>Unassigned</i>";
                  }
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
                              ><?=$dep->name;?></h6>
                            </div>
                          </div>
                        </div>
                      </td>

                        <td>
                          <div class="d-flex align-items-center">
                            <div class="ms-3">
                              <div class="user-meta-info">
                                <h6 class="user-name mb-0"
                                ><?=$row->room?></h6>
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
                                    ><?=$nurse;?></h6>
                                  </div>
                                </div>
                              </div>
                            </td>



                  <td>
                    <div class="action-btn">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$row->Id?>">
                        Assign nurse
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal<?=$row->Id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Assign nurse for <?=$patient->fullName;?></h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="process.php?action=assign-nurse&mrId=<?=$row->Id?>" method="post">

                            <div class="modal-body">
                                <select class="form-control" name="nurseId" required>
                                  <option value="">--Select Nurse--</option>
                                  <?php foreach ($nurse_list as $nu): ?>
                                    <option value="<?=$nu->Id?>"><?=$nu->firstName?> <?=$nu->lastName?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                            </form>
                          </div>
                        </div>
                      </div>
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
