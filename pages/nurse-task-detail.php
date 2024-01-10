<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $mrId = $_GET['mrId'];
  $mr = medical_record()->get("Id=$mrId");
  $account = account()->get("Id=$mr->nurseId");
  $patient = patient()->get("Id=$mr->patientId");
  $task_list = task()->list("mrId=$mrId order by status desc");
?>
<br>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Task List for Patient: <?=$patient->fullName;?></h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted " href="">Nurses</a></li>
            <li class="breadcrumb-item" aria-current="page">Task Lists</li>
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
          <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Tasks..." />
          <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
      </div>
      <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
        <a href="javascript:void(0)" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
          Add New Tasks
        </a>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
          <h5 class="modal-title">New Task for patient: <?=$patient->fullName;?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="process.php?action=task-save" id="addContactModalTitle" method="post">
        <div class="modal-body">
          <div class="add-contact-box">
            <div class="add-contact-content">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3 contact-name">
                    <b>Task:</b>
                    <input type="hidden" name="Id" id="c-id"/>
                    <input type="hidden" name="mrId" value="<?=$mrId?>"/>
                    <input type="hidden" name="nurseId" value="<?=$mr->nurseId?>"/>
                    <input type="hidden" name="hnurseId" value="<?=$user['Id']?>"/>
                    <textarea name="context" class="form-control" required id="c-context"></textarea>
                    <span class="validation-text text-danger"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <b>Date Needed:</b>
                  <input type="date" class="form-control" name="dateNeeded" id="c-dateNeeded" required>
                </div>
                <div class="col-md-6">
                  <b>Time Needed:</b>
                  <input type="time" class="form-control" name="timeNeeded" id="c-timeNeeded" required>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button name="form-type" value="add" id="btn-add" class="btn btn-success rounded-pill px-4">Add</button>
          <button name="form-type" value="edit" id="btn-edit" class="btn btn-success rounded-pill px-4">Save</button>
        </div>
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
          <th>Time</th>
          <th>Task</th>
          <th>Nurse</th>
          <th>Status</th>
          <th width="10%">Action</th>
        </thead>
        <tbody>

        <?php
          $count = 0;
          foreach ($task_list as $row):
          $nurse = account()->get("Id=$row->nurseId");
          $count += 1;
           ?>

          <tr class="search-items">
            <td>
              <div class="d-flex align-items-center">
                <div class="ms-3">
                  <div class="user-meta-info">
                    <h6 class="user-name mb-0"
                    data-id="<?=$row->Id;?>"
                    data-context="<?=$row->context;?>"
                    data-dateNeeded="<?=$row->dateNeeded;?>"
                    data-timeNeeded="<?=$row->timeNeeded;?>"
                    ><?=$count;?></h6>
                  </div>
                </div>
              </div>
            </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="ms-3">
                    <div class="user-meta-info">
                      <h6 class="mb-0"><?=$row->dateNeeded;?></h6>
                    </div>
                  </div>
                </div>
              </td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <div class="user-meta-info">
                        <h6 class="mb-0"><?=$row->timeNeeded;?></h6>
                      </div>
                    </div>
                  </div>
                </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <div class="user-meta-info">
                          <h6 class="mb-0"><?=$row->context;?></h6>
                        </div>
                      </div>
                    </div>
                  </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="ms-3">
                          <div class="user-meta-info">
                            <h6 class="mb-0"><?=$nurse->firstName;?> <?=$nurse->lastName;?></h6>
                          </div>
                        </div>
                      </div>
                    </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="ms-3">
                            <div class="user-meta-info">
                              <h6 class="mb-0"><?=$row->status;?></h6>
                            </div>
                          </div>
                        </div>
                      </td>
            <td>
              <div class="action-btn">
                <a href="javascript:void(0)" class="btn btn-info edit">
                  View
                </a>
                <a href="process.php?action=task-delete&Id=<?=$row->Id?>&mrId=<?=$mrId?>" class="btn btn-danger ms-2">
                  Delete
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
        getModal.find("#c-context").val($_name.attr("data-context"));
        getModal.find("#c-dateNeeded").val($_name.attr("data-dateNeeded"));
        getModal.find("#c-timeNeeded").val($_name.attr("data-timeNeeded"));

        $("#addContactModal").modal("show");
      });
    }

    editContact();

  });
</script>
