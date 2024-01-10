<?php
  $ROOT_DIR="../";
  include $ROOT_DIR . "templates/header.php";

  $task_list = task()->list("nurseId=$account->Id order by status Desc");
?>
<br>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">My tasks</h4>
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
          <th>Patient</th>
          <th>Status</th>
          <th width="10%">Action</th>
        </thead>
        <tbody>

        <?php
          $count = 0;
          foreach ($task_list as $row):
          $mr = medical_record()->get("Id=$row->mrId");
          $patient = patient()->get("Id=$mr->patientId");
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
                            <h6 class="mb-0"><?=$patient->fullName;?></h6>
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
              <?php if ($row->status=="Pending"): ?>
              <div class="action-btn">
                <a href="monitoring-form.php?mrId=<?=$row->mrId?>&taskId=<?=$row->Id?>" class="btn btn-info ms-2">
                  Monitor
                </a>
              </div>
              <?php endif; ?>
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
