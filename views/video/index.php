<?php
    $this->layout('layout/principal', ['base_url' => $base_url]);
    ?>
    <div class="row">
        <div class="col-2">
            <button class="btn btn-success"
            onclick="location.href = '<?= $base_url ?>video/create'">
                <i class="bi bi-plus"></i>
                &nbsp;Adicionar video
            </button>
        </div>
    </div>
    <?php foreach($videos as $video){
        ?>
        <div class="col-lg-4 my-2">
            <div class="card">
                <div class="card-body d-flex flex-column justify-content-center">
                    <iframe  src="<?= $video->getUrl() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                    
                    <h4 class="card-title"><?= $video->getTitle() ?></h4>
                </div>
                <div class="card-footer d-flex justify-content-around">
                    <button class="btn btn-info btn-sm" onclick="window.location.href='<?= $base_url ?>video/edit?id=<?= $video->getId()?>'">
                        <i class="bi bi-pencil-square"></i>
                        Editar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="window.location.href='<?= $base_url ?>video/delete?id=<?= $video->getId()?>'">
                        <i class="bi bi-trash-fill"></i>
                        Remover
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
?>