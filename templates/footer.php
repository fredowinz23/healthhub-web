
      </div>
    </div>
  </div>



  <script src="<?=$ROOT_DIR;?>templates/assets/newjs/jquery.min.js"></script>
  <script src="<?=$ROOT_DIR;?>templates/assets/newjs/simplebar.min.js"></script>
  <script src="<?=$ROOT_DIR;?>templates/assets/newjs/bootstrap.bundle.min.js"></script>

</body>

</html>

<script type="text/javascript">
$(function () {

  <?php if ($success): ?>
    Swal.fire({
      title: "Success!",
      text: "<?=$success?>",
      icon: "success"
    });
  <?php endif; ?>


  <?php if ($error): ?>
    Swal.fire({
      title: "Warning!",
      text: "<?=$error?>",
      icon: "error"
    });
  <?php endif; ?>


  });

</script>
