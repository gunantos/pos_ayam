<?= $this->extend('layout') ?>
<?= $this->section('head_vendor') ?>
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/tables/datatable/datatables.min.css') ?>">
<?= $this->endSection() ?>
<?= $this->section('head') ?>
<style>
  .table thead th{
        text-align: center;
    vertical-align: middle;
  }
  </style>
  <?= $this->endSection() ?>
<?= $this->section('content') ?>
<section id="ajax">
	<div class="row">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">
                     <button class="btn btn-primary text-white" type="button" id="add-button"><i class="icon-plus"></i> Tambah</button>
                   </h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-content collpase show">
	                <div class="card-body card-dashboard">
	                
	                <table class="table table-striped table-bordered ajax-sourced">
					        <thead>
					          
                              <?php
                              if (is_array($header_table)) {
                                echo '<tr>';
                                 foreach($header_table as $key => $value) {
                                    echo '<th>'. $value .'</th>';
                                 }
                                 echo '</tr>';
                                }else{
                                  echo $header_table;
                                }
                              ?>
					        </thead>
					    </table>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <?= $form ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script_vendor') ?>
   <script src="<?= base_url('assets/vendors/js/tables/datatable/datatables.min.js') ?>"></script>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $('#myModal').on('hide.bs.modal', function(event) {
         $('#staticBackdropLabel').html('Tambah Data');
         document.getElementById("formData").reset();
    });
    $('#add-button').click(function() {
      $('#myModal').modal('show');
    });
    function hideModal() {
      $('#myModal').modal('hide');
    }
   const dtable = $(".ajax-sourced").DataTable({
        ajax: '<?= base_url('api/'. $api) ?>'
    });
</script>
<?= $this->endSection() ?>