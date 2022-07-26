<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Material Categories</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('material_categories'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Material Category
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>Category ID :</b><br><?= $data_material_categories['category_id']?></h5>
                    <p class="card-text"><b>Name :</b><br><?= $data_material_categories['name']?></p>
                    <p></p>
                    <a href="<?= base_url(); ?>material_categories" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>