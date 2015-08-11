<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Lignes Station'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="lignesStations index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('ligne_id') ?></th>
            <th><?= $this->Paginator->sort('station_id') ?></th>
            <th><?= $this->Paginator->sort('ordonation') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($lignesStations as $lignesStation): ?>
        <tr>
            <td><?= $this->Number->format($lignesStation->id) ?></td>
            <td>
                <?= $lignesStation->has('ligne') ? $this->Html->link($lignesStation->ligne->name, ['controller' => 'Lignes', 'action' => 'view', $lignesStation->ligne->id]) : '' ?>
            </td>
            <td>
                <?= $lignesStation->has('station') ? $this->Html->link($lignesStation->station->name, ['controller' => 'Stations', 'action' => 'view', $lignesStation->station->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($lignesStation->ordonation) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $lignesStation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignesStation->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignesStation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignesStation->id)]) ?>
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
