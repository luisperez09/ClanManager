<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li role="presentation" ><?= $this->Html->link('<img src="https://api-assets.clashofclans.com/badges/70/bXn2nmDwrMEfheAMPcSyQR7BkFJzaddyQwGDL8TngYg.png" class="img-responsive" style="max-height:25px">', ['controller' => 'users', 'action' => 'index'], ['escape' => false]) ?></li>
          <li role="presentation" class="active"><a href="#">Sanciones</a></li>
          <li role="presentation"><?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span>', ['controller' => 'sanciones', 'action' => 'add'], ['escape' => false]) ?></li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    
    <table class="table table-striped">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('duration') ?></th> -->
                <th class="col-xs-5">Sancionado</th>
                <th class="col-xs-3">Fecha</th>
                <th class="col-xs-4">Duración</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sanciones as $sancion): ?>
            <tr>
                <td><?= $sancion['user_name'] ?></td>
                <td><?= $sancion['created'] ?></td>
                <td><?= $sancion['duration'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </ul>
    </div>
</div>
