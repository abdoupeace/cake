<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Ligne'), ['action' => 'edit', $ligne->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ligne'), ['action' => 'delete', $ligne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ligne->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lignes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ligne'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="lignes view large-10 medium-9 columns">
    <h2><?= h($ligne->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($ligne->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($ligne->id) ?></p>
            <h6 class="subheader"><?= __('Station Count') ?></h6>
            <p><?= $this->Number->format($ligne->station_count) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($ligne->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($ligne->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Cities') ?></h4>
    <?php if (!empty($ligne->cities)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Type') ?></th>
            <th><?= __('Code Postal') ?></th>
            <th><?= __('Ligne Count') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($ligne->cities as $cities): ?>
        <tr>
            <td><?= h($cities->id) ?></td>
            <td><?= h($cities->name) ?></td>
            <td><?= h($cities->type) ?></td>
            <td><?= h($cities->code_postal) ?></td>
            <td><?= h($cities->ligne_count) ?></td>
            <td><?= h($cities->created) ?></td>
            <td><?= h($cities->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Cities', 'action' => 'view', $cities->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Cities', 'action' => 'edit', $cities->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cities', 'action' => 'delete', $cities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cities->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Stations') ?></h4>
    <?php if (!empty($ligne->stations)): ?>
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
        <?php foreach ($ligne->stations as $stations): ?>
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
