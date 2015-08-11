<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Station'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="stations index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('direction') ?></th>
            <th><?= $this->Paginator->sort('has_twin') ?></th>
            <th><?= $this->Paginator->sort('r') ?></th>
            <th><?= $this->Paginator->sort('lon') ?></th>
            <th><?= $this->Paginator->sort('lat') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($stations as $station): ?>
        <tr>
            <td><?= $this->Number->format($station->id) ?></td>
            <td><?= h($station->name) ?></td>
            <td><?= h($station->direction) ?></td>
            <td><?= $this->Number->format($station->has_twin) ?></td>
            <td><?= $this->Number->format($station->r) ?></td>
            <td><?= $this->Number->format($station->lon) ?></td>
            <td><?= $this->Number->format($station->lat) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $station->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $station->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $station->id], ['confirm' => __('Are you sure you want to delete # {0}?', $station->id)]) ?>
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
