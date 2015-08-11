<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Cities Ligne'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="citiesLignes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('ligne_id') ?></th>
            <th><?= $this->Paginator->sort('city_id') ?></th>
            <th><?= $this->Paginator->sort('ordonation') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($citiesLignes as $citiesLigne): ?>
        <tr>
            <td><?= $this->Number->format($citiesLigne->id) ?></td>
            <td>
                <?= $citiesLigne->has('ligne') ? $this->Html->link($citiesLigne->ligne->name, ['controller' => 'Lignes', 'action' => 'view', $citiesLigne->ligne->id]) : '' ?>
            </td>
            <td>
                <?= $citiesLigne->has('city') ? $this->Html->link($citiesLigne->city->name, ['controller' => 'Cities', 'action' => 'view', $citiesLigne->city->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($citiesLigne->ordonation) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $citiesLigne->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $citiesLigne->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $citiesLigne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $citiesLigne->id)]) ?>
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
