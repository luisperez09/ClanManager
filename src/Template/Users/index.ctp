<div class="container-fluid">
    <h3><?= __('Miembros') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Nombre</th>
                <th scope="col">Donados</th>
                <th scope="col">Recibidos</th>
            </tr>
        </thead>
        <tbody data-link="row" class="rowlink">
            <?php foreach ($response['memberList'] as $member): ?>
            <?php if ($member['name'] === "sN0rk"): ?>
                <tr class="danger">
                <td><a href="#myModal" data-toggle="modal" data-target="#myModal">
                    <?= $member['clanRank'] . "   " . $this->Html->image($member['league']['iconUrls']['tiny'])?></a>
                </td>
            <?php  else: ?>
            <tr>
                <td><?= $member['clanRank'] . "   " . $this->Html->image($member['league']['iconUrls']['tiny']) ?></td>
            <?php  endif; ?>    
                <td><?= $member['name'] ?></td>
                <td><?= $member['donations'] ?></td>
                <td ><?= $member['donationsReceived'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Snork</h4>
      </div>
      <div class="modal-body">
        <h5>Causa de suspensión</h6>
        <p>No donó en castillo y atacó fuera de la hora estipulada.</p>
        <hr>
        <h5>Duración:</h6>
        <p>2 guerras</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
