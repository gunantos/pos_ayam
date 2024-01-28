<?= $this->extend('layout') ?>
<?= $this->section('head_vendor') ?>
<?= $this->endSection() ?>
<?= $this->section('head') ?>
  <?= $this->endSection() ?>
<?= $this->section('content') ?>
<section id="google-bar-charts">
<div class="row">
   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="success"><?= number_format($totalPenjualan, 0, ',', '.') ?></h3>
                            <span>Total Penjualan</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="ft-shopping-cart success font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="warning"><?= number_format($setoranTunai, 0, ',', '.') ?></h3>
                            <span>Setoran Tunai</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-layers warning font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="danger"><?= number_format($setoranTransfer, 0, ',', '.') ?></h3>
                            <span>Setoran Transfer</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="ft-credit-card danger font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>
<div class="row">
   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="deep-blue"><?= number_format($totalPengeluaran, 0, ',', '.') ?></h3>
                            <span>Total Pengeluaran</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-handbag deep-blue font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="deep-orange"><?= number_format($totalPenjualanHariIni, 0, ',', '.') ?></h3>
                            <span>Total Penjualan Hari ini</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-basket-loaded deep-orange font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
   <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="success"><?= number_format($totalPenjualanBulanIni, 0, ',', '.') ?></h3>
                            <span>Total Penjualan Bulan ini</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-basket-loaded success font-large-2 float-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </div>
</div>

<div class="grafik">
    <label for="chartType">Select Chart Type:</label>
  <select id="chartType" class="form-control mb-2" onchange="updateChart()">
    <option value="penjualan">Penjualan</option>
    <option value="ayam-masuk">Ayam Masuk</option>
    <option value="ayam-mati">Ayam Mati</option>
    <option value="omset">Omset & DO</option>
    <option value="pengeluaran">Pengeluaran</option>
    <option value="keuangan">Keuangan</option>
    <!-- Add other chart types as needed -->
  </select>

   <div class="grafik-harian">
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Grafik Harian</h4>
                    <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>  
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div id="chart-harian"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div class="grafik-bulanan">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Grafik Bulanan</h4>
                    <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>  
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                         <div id="chart-bulanan"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</div></section>
  <?= $this->endSection() ?>
<?= $this->section('script_vendor') ?>

    <script src="https://www.google.com/jsapi"></script>
    
  <?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    var options_column = {
        height: 400,
        fontSize: 12,
        chartArea: {
            left: '5%',
            width: '90%',
            height: 350
        },
        vAxis: {
            gridlines:{
                color: '#e9e9e9',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'center',
            textStyle: {
                fontSize: 12
            }
        }
    };

   google.load('visualization', '1.0', {'packages':['corechart']});
   google.setOnLoadCallback(fetchData);

  function fetchData() {
  var selectedChartType = document.getElementById('chartType').value;

  fetch(`<?= base_url('api/chart') ?>/${selectedChartType}`)
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(jsonData => {
      drawChart(jsonData);
    })
    .catch(error => {
      console.error('Error during fetch:', error);
    });
}

   function drawChart(data) {
    var dataHarian =  google.visualization.arrayToDataTable(data.harian);
    var dataBulanan =  google.visualization.arrayToDataTable(data.bulan);

    var bar = new google.visualization.ColumnChart(document.getElementById('chart-harian'));
    bar.draw(dataHarian, options_column);

    var bar2 = new google.visualization.ColumnChart(document.getElementById('chart-bulanan'));
    bar2.draw(dataBulanan, options_column);

}
function updateChart() {
    fetchData();
  }
   $(function () {

    // Resize chart on menu width change and window resize
    $(window).on('resize', resize);
    $(".menu-toggle").on('click', resize);

    // Resize function
    function resize() {
        drawColumn();
    }
});
</script>
  <?= $this->endSection() ?>