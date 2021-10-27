 <!-- Header -->
 <div class="header bg-primary pb-6">
     <div class="container-fluid">
         <div class="header-body">
             <div class="row align-items-center py-4">
                 <div class="col-lg-9 col-7">
                     <div class="alert alert-default" role="alert" style="font-size:20px">
                         <strong>Selamat Datang! </strong> Sistem Pemetaan Perilaku Mahasiswa Universitas Ahmad Dahlan
                     </div>
                 </div>
                 <div class="col-lg-3 col-5 text-center" style="color: #FFF;">
                     <div class="alert alert-danger" role="alert">
                         <table border="0" width="100%" style="font-size:20px">
                             <tr>
                                 <td>
                                     <span><?= date('d M Y') ?></span>
                                 </td>
                                 <td>
                                     <span id="jam"></span> : <span id="menit"></span> : <span id="detik"></span>
                                 </td>
                             </tr>
                         </table>
                     </div>
                 </div>
             </div>
             <!-- Card stats -->
             <div class="row">
                 <div class="col-xl-3 col-md-6">
                     <div class="card card-stats">
                         <!-- Card body -->
                         <div class="card-body">
                             <div class="row">
                                 <div class="col">
                                     <h5 class="card-title text-uppercase text-muted mb-0">Total Pengujian</h5>
                                     <span class="h2 font-weight-bold mb-0">350,897</span>
                                 </div>
                                 <div class="col-auto">
                                     <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                         <i class="ni ni-active-40"></i>
                                     </div>
                                 </div>
                             </div>
                             <p class="mt-3 mb-0 text-sm">
                                 <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                 <span class="text-nowrap">Since last month</span>
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-md-6">
                     <div class="card card-stats">
                         <!-- Card body -->
                         <div class="card-body">
                             <div class="row">
                                 <div class="col">
                                     <h5 class="card-title text-uppercase text-muted mb-0">Total Dataset</h5>
                                     <span class="h2 font-weight-bold mb-0"><?= get_dataset()->num_rows() ?><small> Row</small></span>
                                 </div>
                                 <div class="col-auto">
                                     <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                         <i class="ni ni-money-coins"></i>
                                     </div>
                                 </div>
                             </div>
                             <p class="mt-3 mb-0 text-sm">
                                 <span class="text-success mr-2"><i class="ni ni-cloud-upload-96"></i> Update <?= date('d/m/Y', strtotime(get_update_dataset()->created_dataset)) ?></span>
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-md-6">
                     <div class="card card-stats">
                         <!-- Card body -->
                         <div class="card-body">
                             <div class="row">
                                 <div class="col">
                                     <h5 class="card-title text-uppercase text-muted mb-0">Total Itemset</h5>
                                     <span class="h2 font-weight-bold mb-0"><?= get_last_itemset()->itemset_dataset ?><small> Itemset</small></span>
                                 </div>
                                 <div class="col-auto">
                                     <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                         <i class="ni ni-chart-pie-35"></i>
                                     </div>
                                 </div>
                             </div>
                             <p class="mt-3 mb-0 text-sm">
                                 <span class="text-success mr-2"><i class="ni ni-cloud-upload-96"></i> Update <?= date('d/m/Y', strtotime(get_update_dataset()->created_dataset)) ?></span>
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-md-6">
                     <div class="card card-stats">
                         <!-- Card body -->
                         <div class="card-body">
                             <div class="row">
                                 <div class="col">
                                     <h5 class="card-title text-uppercase text-muted mb-0">Pengguna</h5>
                                     <span class="h2 font-weight-bold mb-0"><?= get_count_user()->num_rows() ?> <small> Users</small></span>
                                 </div>
                                 <div class="col-auto">
                                     <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                         <i class="ni ni-chart-bar-32"></i>
                                     </div>
                                 </div>
                             </div>
                             <p class="mt-3 mb-0 text-sm">
                                 <span class="text-success mr-2"><i class="ni ni-cloud-upload-96"></i> Update <?= date('d/m/Y', strtotime(get_update_user()->created_user)) ?></span>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Page content -->
 <div class="container-fluid mt--6">
     <div class="row">

     </div>

 </div>