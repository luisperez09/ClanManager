<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="#">Miembros</a></li>
          <li role="presentation"><a href="#">Sanciones</a></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="col-xs-2"></th>
                <th scope="col" class="col-xs-4">Nombre</th>
                <th scope="col" class="col-xs-3">Donados</th>
                <th scope="col" class="col-xs-3">Recibidos</th>
            </tr>
        </thead>
        <tbody data-link="row" class="rowlink">
            <?php foreach ($response['memberList'] as $member):
                $tr_options = array();
                $donations_options = array();

                if ($member['name'] === "sN0rk") {
                    $tr_options = array('class' => 'danger', 'data-toggle' => 'modal', 'data-target' =>'#myModal');
                    $aux = $this->Html->image($member['league']['iconUrls']['tiny']);
                }
                if ($member['tag'] == $highest_donor_tag) {
                    $donations_options = array('class' => 'success');
                }
                   
                echo $this->Html->tableCells(
                    [
                        $this->Html->image($member['league']['iconUrls']['tiny']),
                        $member['name'],
                        [$member['donations'], $donations_options],
                        $member['donationsReceived']
                    ],
                    $tr_options
                    );
             endforeach; ?>
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
