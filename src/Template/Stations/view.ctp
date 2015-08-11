<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Station'), ['action' => 'edit', $station->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Station'), ['action' => 'delete', $station->id], ['confirm' => __('Are you sure you want to delete # {0}?', $station->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="stations view large-10 medium-9 columns">
    <h2><?= h($station->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($station->name) ?></p>
            <h6 class="subheader"><?= __('Direction') ?></h6>
            <p><?= h($station->direction) ?></p>
            <h6 class="subheader"><?= __('City') ?></h6>
            <p><?= $station->has('city') ? $this->Html->link($station->city->name, ['controller' => 'Cities', 'action' => 'view', $station->city->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($station->id) ?></p>
            <h6 class="subheader"><?= __('Has Twin') ?></h6>
            <p><?= $this->Number->format($station->has_twin) ?></p>
            <h6 class="subheader"><?= __('R') ?></h6>
            <p><?= $this->Number->format($station->r) ?></p>
            <h6 class="subheader"><?= __('Lon') ?></h6>
            <p><?= $this->Number->format($station->lon) ?></p>
            <h6 class="subheader"><?= __('Lat') ?></h6>
            <p><?= $this->Number->format($station->lat) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($station->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($station->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Lignes') ?></h4>
    <?php if (!empty($station->lignes)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Station Count') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($station->lignes as $lignes): ?>
        <tr>
            <td><?= h($lignes->id) ?></td>
            <td><?= h($lignes->name) ?></td>
            <td><?= h($lignes->station_count) ?></td>
            <td><?= h($lignes->created) ?></td>
            <td><?= h($lignes->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Lignes', 'action' => 'view', $lignes->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Lignes', 'action' => 'edit', $lignes->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lignes', 'action' => 'delete', $lignes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignes->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
