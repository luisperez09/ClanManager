<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="#"><img src="https://api-assets.clashofclans.com/badges/70/bXn2nmDwrMEfheAMPcSyQR7BkFJzaddyQwGDL8TngYg.png" class="img-responsive" style="max-height:25px"></a></li>
          <li role="presentation"><?= $this->Html->link('Sanciones', ['controller' => 'sanciones', 'action' => 'index']) ?></li>
          <li role="presentation" ><?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span>', ['controller' => 'sanciones', 'action' => 'add'], ['escape' => false]) ?></li>
        </ul>
    </div>
</nav>
<div class="row">
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

                if ($member['sancionado'] == true) {
                    $tr_options = ['class' => 'danger', 'data-toggle' => 'modal', 'data-target' =>'#detailedModal',
                        'data-icon' => $member['league']['iconUrls']['tiny'], 'data-name' => $member['name'],
                        'data-description' => $member['sancion_data']['description'],
                        'data-duration' => $member['sancion_data']['duration']
                    ];
                    $aux = $this->Html->image($member['league']['iconUrls']['tiny']);
                }
                                  
                echo $this->Html->tableCells(
                    [
                        $this->Html->image($member['league']['iconUrls']['tiny']),
                        [$member['name'], ['escape' => false]],
                        [$member['donations'], $donations_options],
                        $member['donationsReceived']
                    ],
                    $tr_options, $tr_options
                    );
             endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="detailedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <img style="float:left"><h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <h4>Causa de suspensión</h4>
        <p></p>
        <hr>
        <h4>Duración:</h4>
        <span></span>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#detailedModal').on('show.bs.modal', function (event) {
      var row = $(event.relatedTarget) // Button that triggered the modal
      var imgLink = row.data('icon') // Extract info from data-* attributes
      var name = row.data('name')
      var description = row.data('description')
      var duration = row.data('duration')
      var modal = $(this)
      modal.find('.modal-title').text(name)
      modal.find('.modal-header img').attr('src', imgLink)
      modal.find('.modal-body p').text(description)
      modal.find('.modal-body span').text(duration)
  })
</script>
