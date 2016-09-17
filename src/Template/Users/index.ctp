<div class="container-fluid">
    <h3><?= __('Miembros') ?></h3>
    <table class="table table-striped table-hover">
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
                <tr class="danger" data-toggle="modal" data-target="#myModal">
                <td>
                    <?= $member['clanRank'] . "   " . $this->Html->image($member['league']['iconUrls']['tiny'])?>
                    <?php $aux = $this->Html->image($member['league']['iconUrls']['tiny'])?>
                </td>
            <?php  else: ?>
            <tr>
                <td><?= $member['clanRank'] . "   " . $this->Html->image($member['league']['iconUrls']['tiny']) ?></td>
            <?php  endif; ?>    
                <td><?= $member['name'] ?></td>
                <td <?php if ($member['tag'] == $highest_donor_tag){echo 'class="success"'; } ?>><?= $member['donations'] ?></td>
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
        <h4 class="modal-title" id="myModalLabel"> <?= $aux ?> Snork</h4>
      </div>
      <div class="modal-body">
        <h5>Causa de suspensión</h6>
        <p>No donó en castillo y atacó fuera de la hora estipulada.</p>
        <hr>
        <h5>Duración:</h6>
        <p>2 guerras</p>
      </div>
    </div>
  </div>
</div>
