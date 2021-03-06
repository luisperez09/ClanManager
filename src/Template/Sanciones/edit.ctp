<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sancione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sancione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sanciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sanciones form large-9 medium-8 columns content">
    <?= $this->Form->create($sancione) ?>
    <fieldset>
        <legend><?= __('Edit Sancione') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('duration');
            echo $this->Form->input('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
