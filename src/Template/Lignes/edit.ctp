<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ligne->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ligne->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="lignes form large-10 medium-9 columns">
    <?= $this->Form->create($ligne) ?>
    <fieldset>
        <legend><?= __('Edit Ligne') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('station_count');
            echo $this->Form->input('cities._ids', ['options' => $cities]);
            echo $this->Form->input('stations._ids', ['options' => $stations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
