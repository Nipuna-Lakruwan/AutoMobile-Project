<style>
    .toast {
        margin-top: 4%;
        background-color: black!important;
        color: white!important;
        border-bottom: 2px solid red!important;
        padding-left: 24px!important;
        width: 300px;
        font-size: 1.15rem;
    }
    .d-flex {
        z-index: 11;
    }
</style>
<?php
if(isset($_SESSION['message'])) {
    ?>
    <div class="d-flex justify-content-end position-fixed top-0 p-3">
      <div id="liveToast" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
        <div class="d-flex">
          <div class="toast-body">
            <?php echo $_SESSION['message']; ?>
          </div>
          <!--<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>-->
        </div>
      </div>
    </div>
    
    <script>
        window.addEventListener('load', function() {
            var toastEl = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
    <?php
    unset($_SESSION['message']);
}
?>