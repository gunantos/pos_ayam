<?= $this->extend('layout') ?>
<?= $this->section('head_vendor') ?>
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/css/tables/datatable/datatables.min.css') ?>">
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
					            <tr>
                              <?php
                                 foreach($header_table as $key) {
                                    echo '<th>'. $key['label'] .'</th>';
                                 }
                              ?>
					            </tr>
					        </thead>
					    </table>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<?= $form ?>

<?= $this->endSection() ?>
<?= $this->section('script_vendor') ?>
   <script src="<?= base_url('assets/vendors/js/tables/datatable/datatables.min.js') ?>"></script>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
   $(".ajax-sourced").DataTable({
        ajax: "../../../app-assets/data/datatables/ajax-sourced.json"
    });
</script>
<?= $this->endSection() ?>