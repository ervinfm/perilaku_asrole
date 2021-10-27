<?php if (!empty($this->session->has_userdata('succes'))) { ?>
  <script>
    Swal.fire(
      'Good job!',
      '<?= $this->session->flashdata('succes') ?>',
      'success'
    )
  </script>
<?php
  $this->session->unset_userdata('succes');
} ?>

<?php if (!empty($this->session->has_userdata('error'))) { ?>
  <script>
    Swal.fire(
      'Oops...!',
      '<?= $this->session->flashdata('error') ?>',
      'error'
    )
  </script>
<?php
  $this->session->unset_userdata('error');
} ?>

<?php if (!empty($this->session->has_userdata('warning'))) { ?>
  <script>
    Swal.fire(
      'Stop...!',
      '<?= $this->session->flashdata('warning') ?>',
      'warning'
    )
  </script>
<?php
  $this->session->unset_userdata('warning');
} ?>