<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li role="presentation" ><?= $this->Html->link('<img src="https://api-assets.clashofclans.com/badges/70/bXn2nmDwrMEfheAMPcSyQR7BkFJzaddyQwGDL8TngYg.png" class="img-responsive" style="max-height:25px">', ['controller' => 'users', 'action' => 'index'], ['escape' => false]) ?></li>
          <li role="presentation"><?= $this->Html->link('Sanciones', ['controller' => 'sanciones', 'action' => 'index']) ?></li>
          <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-plus"></span></a></li>
        </ul>
    </div>
</nav>
<div class="row">
    <?= $this->Form->create($sancione) ?>
    <form>
        <fieldset>   
            <div class="form-group">
             <?php  echo $this->Form->input('user_tag', ['label' => 'Sancionado', 'class' => 'form-control hidden-placeholder', 'options' => $users, 'empty' => 'Seleccione']); ?>
            </div>

            <div class="form-group">        
                    <?php echo $this->Form->input('duration', ['class' => 'form-control hidden-placeholder', 'label' => 'Duración', 'type' => 'select', 'options' => ['1 guerra' => '1 guerra', '2 guerras' => '2 guerras', '3 guerras' => '3 guerras', '4 guerras' => '4 guerras', '5 guerras' => '5 guerras'], 'empty' => 'Seleccione']); ?>
            </div>

            <div class="form-group">
              
            <?php echo $this->Form->input('description', ['label' => 'Causa de la sanción', 'class' => 'form-control', 'placeholder'=> 'Ej: Atacó tarde / No donó en castillo']); 
              ?> 
            </div>

        </fieldset>
    <div class="row"><?= $this->Form->submit('Guardar Sanción', ['class' => 'btn btn-success btn-lg'] ) ?></div>
    <?= $this->Form->end() ?>
    </form>
</div>
