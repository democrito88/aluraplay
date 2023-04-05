<?php $this->insert("/layout/parteDeCima"); ?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>lista de filmes</h3>
            </div>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>título</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($videos as $video): ?>
                    <tr>
                        <td>
                            <?= $video->getTitle() ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <a href="<?= $base_url ?>video/index">ver mais...</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php $this->insert("layout/parteDeBaixo"); ?>