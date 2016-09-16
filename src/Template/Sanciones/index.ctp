<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sancione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sanciones index large-9 medium-8 columns content">
    <h3><?= __('Sanciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sanciones as $sancione): ?>
            <tr>
                <td><?= $this->Number->format($sancione->id) ?></td>
                <td><?= $this->Number->format($sancione->duration) ?></td>
                <td><?= h($sancione->created) ?></td>
                <td><?= $sancione->has('user') ? $this->Html->link($sancione->user->name, ['controller' => 'Users', 'action' => 'view', $sancione->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sancione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sancione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sancione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sancione->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
