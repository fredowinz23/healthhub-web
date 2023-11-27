<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $userId = $user["Id"];
  $nurse_list = account()->list("nHeadNurseId=$userId");
?>

<br>

      <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Nurse List</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted " href="">Nurses</a></li>
                  <li class="breadcrumb-item" aria-current="page">Nurse List</li>
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
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search a nurse..." />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">

            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title"><?=$role;?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="process.php?action=account-save" id="addContactModalTitle" method="post">
              <div class="modal-body">
                <div class="add-contact-box">
                  <div class="add-contact-content">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="mb-3 contact-name">
                          <input type="hidden" name="Id" id="c-id"/>
                          <input type="hidden" name="role" value="<?=$role;?>"/>
                          <input type="text" name="username" id="c-username" class="form-control" placeholder="Username" disabled/>
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 contact-name">
                          <input type="text" name="firstName" id="c-firstname" class="form-control" placeholder="First Name" disabled/>
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 contact-name">
                          <input type="text" name="lastName" id="c-lastname" class="form-control" placeholder="Last Name" disabled/>
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                    </div>
                    <?php if ($role=="Head Nurse" || $role=="Nurse"): ?>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3 contact-name">
                            <b>Shift Start</b>
                            <input type="time" name="shiftStart" id="c-shiftstart" class="form-control" disabled/>
                            <span class="validation-text text-danger"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3 contact-name">
                            <b>Shift End</b>
                            <input type="time" name="shiftEnd" id="c-shiftEnd" class="form-control" disabled/>
                            <span class="validation-text text-danger"></span>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
        <div class="card card-body">
          <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
              <thead class="header-item">
                <th>Username</th>
                <th>Full Name</th>
                <th>Shifts</th>
                <th width="10%">Action</th>
              </thead>
              <tbody>
                <!-- start row -->

                <?php
                $count = 0;
                foreach ($nurse_list as $row):
                  $count += 1;
                   ?>

                <tr class="search-items">
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <div class="user-meta-info">
                          <h6 class="user-name mb-0"
                          data-id="<?=$row->Id;?>"
                          data-username="<?=$row->username;?>"
                           data-firstName="<?=$row->firstName;?>"
                           data-lastName="<?=$row->lastName;?>"
                           data-shiftStart="<?=$row->shiftStart;?>"
                           data-shiftEnd="<?=$row->shiftEnd;?>"
                          ><?=$count;?>. <?=$row->username;?></h6>
                        </div>
                      </div>
                    </div>
                  </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="ms-3">
                          <div class="user-meta-info">
                            <h6 class="mb-0"><?=$row->firstName;?> <?=$row->lastName;?></h6>
                          </div>
                        </div>
                      </div>
                    </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="ms-3">
                            <div class="user-meta-info">
                              <h6 class="mb-0"><?=$row->shiftStart;?> to <?=$row->shiftEnd;?></h6>
                            </div>
                          </div>
                        </div>
                      </td>
                  <td>
                    <div class="action-btn">
                      <a href="javascript:void(0)" class="text-info edit btn btn-warning">
                        View
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


            <script type="text/javascript">
            $(function () {

                $("#input-search").on("keyup", function () {
                  var rex = new RegExp($(this).val(), "i");
                  $(".search-table .search-items:not(.header-item)").hide();
                  $(".search-table .search-items:not(.header-item)")
                    .filter(function () {
                      return rex.test($(this).text());
                    })
                    .show();
                });

                $("#btn-add-contact").on("click", function (event) {

                  var $_username = document.getElementById("c-username");
                  $_username.value = "";

                  var $_generatedpw = Math.floor(Math.random()*899999+100000);

                  var $_password = document.getElementById("c-password");
                  $_password.value = $_generatedpw;

                  var $_dpassword = document.getElementById("c-display-password");
                  $_dpassword.value = $_generatedpw;

                  $("#addContactModal #btn-add").show();
                  $("#addContactModal #btn-edit").hide();
                  $("#addContactModal").modal("show");
                });


                function editContact() {
                  $(".edit").on("click", function (event) {
                    $("#addContactModal #btn-add").hide();
                    $("#addContactModal #btn-edit").show();

                    // Get Parents
                    var getParentItem = $(this).parents(".search-items");
                    var getModal = $("#addContactModal");

                    // Get List Item Fields
                    var $_name = getParentItem.find(".user-name");
                    // Set Modal Field's Value
                    getModal.find("#c-id").val($_name.attr("data-id"));
                    getModal.find("#c-username").val($_name.attr("data-username"));
                    getModal.find("#c-firstName").val($_name.attr("data-firstName"));
                    getModal.find("#c-lastName").val($_name.attr("data-lastName"));
                    getModal.find("#c-shiftStart").val($_name.attr("data-shiftStart"));
                    getModal.find("#c-shiftEnd").val($_name.attr("data-shiftEnd"));

                    $("#addContactModal").modal("show");
                  });
                }

                editContact();

              });
            </script>
