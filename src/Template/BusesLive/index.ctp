<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Buses Live'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="busesLive index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('ligne_id') ?></th>
            <th><?= $this->Paginator->sort('station_id') ?></th>
            <th><?= $this->Paginator->sort('state') ?></th>
            <th><?= $this->Paginator->sort('lon') ?></th>
            <th><?= $this->Paginator->sort('lat') ?></th>
            <th><?= $this->Paginator->sort('at') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($busesLive as $busesLive): ?>
        <tr>
            <td><?= $this->Number->format($busesLive->id) ?></td>
            <td>
                <?= $busesLive->has('ligne') ? $this->Html->link($busesLive->ligne->name, ['controller' => 'Lignes', 'action' => 'view', $busesLive->ligne->id]) : '' ?>
            </td>
            <td>
                <?= $busesLive->has('station') ? $this->Html->link($busesLive->station->name, ['controller' => 'Stations', 'action' => 'view', $busesLive->station->id]) : '' ?>
            </td>
            <td><?= h($busesLive->state) ?></td>
            <td><?= $this->Number->format($busesLive->lon) ?></td>
            <td><?= $this->Number->format($busesLive->lat) ?></td>
            <td><?= h($busesLive->at) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $busesLive->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $busesLive->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $busesLive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busesLive->id)]) ?>
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
