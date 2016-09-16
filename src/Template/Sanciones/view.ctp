<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sancione'), ['action' => 'edit', $sancione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sancione'), ['action' => 'delete', $sancione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sancione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sanciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sancione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sanciones view large-9 medium-8 columns content">
    <h3><?= h($sancione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sancione->has('user') ? $this->Html->link($sancione->user->name, ['controller' => 'Users', 'action' => 'view', $sancione->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sancione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($sancione->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sancione->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($sancione->description)); ?>
    </div>
</div>
