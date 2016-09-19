<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li role="presentation" ><?= $this->Html->link('Miembros', ['controller' => 'users', 'action' => 'index']) ?></li>
          <li role="presentation"><?= $this->Html->link('Sanciones', ['controller' => 'sanciones', 'action' => 'index']) ?></li>
          <li role="presentation" class="active"><a href="#">+ Sanción</a></li>
        </ul>
    </div>
</nav>
<div class="row">
    <?= $this->Form->create($sancione) ?>
    <form>
    <fieldset>       
            <div class="form-group">
            <?php echo $this->Form->input('description', ['label' => 'Causa de la sanción', 'class' => 'form-control', 'placeholder'=> 'Atacó tarde / No donó en castillo']); ?> 
            </div>
            <div class="form-group">
                <?php 
                    echo $this->Form->input('duration', ['label' => 'Duración', 'class' => 'form-control', 'placeholder' => '1 guerra / 3 guerras'] ); ?>
            </div>
            <div class="form-group">        
                    <?php echo $this->Form->input('user_name_string', ['label' => 'Sancionado', 'class' => 'form-control', 'placeholder' => 'Nombre del infractor']);?>
            </div>

    </fieldset>
    <div class="row"><?= $this->Form->submit('Guardar Sanción', ['class' => 'btn btn-success btn-lg'] ) ?></div>
    <?= $this->Form->end() ?>
    </form>
</div>
