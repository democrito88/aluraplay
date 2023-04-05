<?php $this->layout('layout/principal', ['base_url' => $base_url]); ?>
<div class="row">
    <div class="col-2">
        <button class="btn btn-warning"
        onclick="location.href='<?= $base_url ?>video/index'">
            <i class="bi bi-arrow-left"></i>
            voltar
        </button>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center"><?= $titulo ?></h3>
                </div>
                <form action="<?= isset($video) ? "update" : "store" ?>" method="post" enctype="multipart/form-data">
                    <?= isset($video) ? "<input type='hidden' name='id' value='" . $video->getId() . "' >" : "" ?>
                    <div class="form-group">
                        <label for="url" class="form-label">URL</label>
                        <input id="url" name="url" type="text" class="form-control" value="<?= isset($video) ? $video->getUrl() : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" name="title" type="text" class="form-control" value="<?= isset($video) ? $video->getTitle() : "" ?>">
                    </div>
                    <div class="form-group">
                        <label for="path" class="form-label">Suba um arquivo</label>
                        <input id="path" name="path" type="file" class="form-control" value="<?= isset($video) ? $video->getPath() : "" ?>">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>