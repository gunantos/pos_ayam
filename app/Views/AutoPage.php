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
	                <div class="card-body card-dashboard table-responsive">
	                
	                <table class="table table-striped table-bordered ajax-sourced">
					        <thead>
					          
                              <?php
                              $insertTable = false;
                              if (isset($header_table) && !empty($header_table)) {
                              if (is_array($header_table)) {
                                $insertTable = true;
                                echo '<tr>';
                                 foreach($header_table as $key => $value) {
                                    echo '<th>'. $value .'</th>';
                                 }
                                 echo '</tr>';
                                }else{
                                  echo $header_table;
                                }
                              }

                                $clm = $model->myfields();
                                
                                $tbl = '<tr>';
                                $tbl2 = '';
                                $rowspan = 1;
                                $clmDatatable = [];

                                if (!$insertTable) {
                                  $ontable = [];
                                  foreach($clm as $key) {
                                    $showon = isset($key['showOnTable']) ? $key['showOnTable'] : false;
                                    if ($showon) {
                                      if (isset($key['group_table']) && !empty($key['group_table'])) {
                                        $rowspan = 2;
                                        $findindex = array_search($key['group_table'], array_column($ontable, 'name'));
                                        if ($findindex !== false) {
                                          $ontable[$findindex]['items_table'][] = $key;
                                        } else {
                                          $ontable[] = ['name'=>$key['group_table'], 'items_table'=>[$key]];
                                        }
                                        
                                      } else {
                                        $ontable[] = $key;
                                      }
                                    }
                                  }
                                    foreach($ontable as $key) {
                                      if (isset($key['items_table'])) 
                                      {
                                          $tbl .= '<th rowspan ="1" colspan="'. sizeof($key['items_table']).'">'. $key['name'] .'</th>';
                                          foreach($key['items_table'] as $k) {
                                            $tbl2 .= '<th>'. $k['label'] .'</th>';
                                            $clmDatatable[] = ['data'=>$k['name']];
                                          }
                                      } else {
                                        $tbl .= '<th rowspan="'. $rowspan .'">'. $key['label'] .'</th>';
                                        $clmDatatable[] = ['data'=>$key['name']];
                                      }
                                    }
                                    $tbl .= '<th rowspan="'. $rowspan .'"></th></tr>';
                                    if (!empty($tbl2)) {
                                      $tbl2 = '<tr>'. $tbl2 . '</tr>';
                                    }
                                   echo $tbl;
                                   echo $tbl2;

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
        <h5 class="modal-title" id="staticBackdropLabel">Tamba Data</h5>
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
      const Primary = "<?= $model->primaryKey() ?>";
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
  const colmntable = <?= json_encode($clmDatatable) ?>;
  colmntable.push({
    data: null,
     render:function(row) {
      console.log(row);
        return `<button class="btn btn-sm btn-warning edit-btn" onclick="edit('${btoa(JSON.stringify(row))}')">Edit</button> 
        <button class="btn btn-sm btn-danger delete-btn"  onclick="hapus('${btoa(JSON.stringify(row))}')">Delete</button>`;
      }
  })
  
   const dtable = $(".ajax-sourced").DataTable({
        ajax: '<?= base_url('api/'. $api) ?>',
        processing: true,
        serverSide: true,
        columns: colmntable
    });
    const form = document.getElementById('formData');
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const idd = document.getElementById(Primary);
      let id = '';
      if (idd !== undefined && idd !== null && idd !== '') {
        id = idd.value;
      }
      var formData = new FormData(form);
      fetch('<?= base_url('api/'. $api) ?>' + '/'+ id, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                swal({
                  position: "top-end",
                  icon: data.status ? "success" : "error",
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
                });
                if (data.status) {
                  dtable.ajax.reload();
                }
                hideModal();
            })
            .catch(error => {
                swal({
                  position: "top-end",
                  icon: "error",
                  title: "Gagal Menambahkan data",
                  showConfirmButton: false,
                  timer: 1500
                });
            });
    });
    function edit(row) {
      row = atob(row);
      row = JSON.parse(row);
      for (const [key, val] of Object.entries(row)) {
        let itm = document.getElementById(key);
        if (itm !== undefined && itm !== null && itm !== '') {
          itm.value = val;
        }
      }
      
      $('#myModal').modal('show');
    }
    function hapus(row) {
      row = atob(row);
      row = JSON.parse(row);
      let id = row[Primary];
      if (id == null || id == undefined || id == '') {
        swal("Cancel!", "Tentukan data yang ingin dihapus", "error");
        return;
      }
      swal({
        title: "Apakah anda yakin ingin menghapus data "+ row[Primary] +" ?",
        buttons: {
                cancel: {
                    text: "No, cancel !",
                    value: null,
                    visible: true,
                    className: "btn-warning",
                    closeModal: true,
                },
                confirm: {
                    text: "Yes, delete it!",
                    value: true,
                    visible: true,
                    className: "btn-danger",
                    closeModal: false
                }
              },
      }).then(result => {
        console.log(result);
        if (result) {
          fetch('<?= base_url('api/'. $api .'/delete/') ?>' + id, {
                      method: 'POST',
                      body: formData
                  })
                  .then(response => response.json())
                  .then(data => {
                    swal(data.status ? "success" : "error", data.message, data.status ? "success" : "error");
                      
                      if (data.status) {
                        dtable.ajax.reload();
                      }
                      hideModal();
                  })
                  .catch(error => {
                      swal("Cancel!", "Gagal menghapus data", "error");
                  });
        }
      });
    }
</script>
<?= $this->endSection() ?>