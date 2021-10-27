<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">

        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class=" col ">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1> Hasil Association Rule Mining</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="<?= site_url('admin/dataset') ?>" class="btn btn-sm btn-<?= $this->uri->segment(3) == null ? 'default' : 'neutral' ?>">Dataset</a>
                            <a href="<?= site_url('admin/dataset/upload') ?>" class="btn btn-sm btn-<?= $this->uri->segment(3) == 'upload' ? 'danger' : 'neutral' ?>">Upload</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>