<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $busesLive->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $busesLive->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Buses Live'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="busesLive form large-10 medium-9 columns">
    <?= $this->Form->create($busesLive) ?>
    <fieldset>
        <legend><?= __('Edit Buses Live') ?></legend>
        <?php
            echo $this->Form->input('ligne_id', ['options' => $lignes]);
            echo $this->Form->input('station_id', ['options' => $stations]);
            echo $this->Form->input('state');
            echo $this->Form->input('lon');
            echo $this->Form->input('lat');
            echo $this->Form->input('at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
