<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="cities view large-10 medium-9 columns">
    <h2><?= h($city->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($city->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($city->id) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= $this->Number->format($city->type) ?></p>
            <h6 class="subheader"><?= __('Code Postal') ?></h6>
            <p><?= $this->Number->format($city->code_postal) ?></p>
            <h6 class="subheader"><?= __('Ligne Count') ?></h6>
            <p><?= $this->Number->format($city->ligne_count) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($city->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($city->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Stations') ?></h4>
    <?php if (!empty($city->stations)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('To') ?></th>
            <th><?= __('Has Twin') ?></th>
            <th><?= __('R') ?></th>
            <th><?= __('Lon') ?></th>
            <th><?= __('Lat') ?></th>
            <th><?= __('City Id') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($city->stations as $stations): ?>
        <tr>
            <td><?= h($stations->id) ?></td>
            <td><?= h($stations->name) ?></td>
            <td><?= h($stations->to) ?></td>
            <td><?= h($stations->has_twin) ?></td>
            <td><?= h($stations->r) ?></td>
            <td><?= h($stations->lon) ?></td>
            <td><?= h($stations->lat) ?></td>
            <td><?= h($stations->city_id) ?></td>
            <td><?= h($stations->created) ?></td>
            <td><?= h($stations->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Stations', 'action' => 'view', $stations->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Stations', 'action' => 'edit', $stations->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stations', 'action' => 'delete', $stations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stations->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Lignes') ?></h4>
    <?php if (!empty($city->lignes)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Station Count') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($city->lignes as $lignes): ?>
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
