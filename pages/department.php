<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $department_list = department()->list();
?>

<br>

          <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
              <div class="row align-items-center">
                <div class="col-9">
                  <h4 class="fw-semibold mb-8">Department</h4>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a class="text-muted " href="">Settings</a></li>
                      <li class="breadcrumb-item" aria-current="page">Department</li>
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
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Deparment..." />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                  </form>
                </div>
                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                  <a href="javascript:void(0)" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
                    <i class="ti ti-users text-white me-1 fs-5"></i> Add Department
                  </a>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title">Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="process.php?action=department-save" id="addContactModalTitle" method="post">
                  <div class="modal-body">
                    <div class="add-contact-box">
                      <div class="add-contact-content">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="mb-3 contact-name">
                              <input type="hidden" name="Id" id="c-id" class="form-control" placeholder="Name" />
                              <input type="text" name="name" id="c-name" class="form-control" placeholder="Name" required/>
                              <span class="validation-text text-danger"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button name="form-type" value="add" id="btn-add" class="btn btn-success rounded-pill px-4">Add</button>
                    <button name="form-type" value="edit" id="btn-edit" class="btn btn-success rounded-pill px-4">Save</button>
                    <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal"> Discard </button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <div class="card card-body">
              <div class="table-responsive">
                <table class="table search-table align-middle text-nowrap">
                  <thead class="header-item">
                    <th>Name</th>
                    <th width="10%">Action</th>
                  </thead>
                  <tbody>
                    <!-- start row -->

                    <?php
                    $count = 0;
                    foreach ($department_list as $row):
                      $count += 1;
                       ?>

                    <tr class="search-items">
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="ms-3">
                            <div class="user-meta-info">
                              <h6 class="user-name mb-0" data-id="<?=$row->Id;?>" data-name="<?=$row->name;?>"><?=$count;?>. <?=$row->name;?></h6>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="action-btn">
                          <a href="javascript:void(0)" class="text-info edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                          <a href="process.php?action=department-delete&Id=<?=$row->Id?>" class="text-dark ms-2">
                            <i class="ti ti-trash fs-5"></i>
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


          <script src="<?=$ROOT_DIR;?>pages/js/department.js"></script>
