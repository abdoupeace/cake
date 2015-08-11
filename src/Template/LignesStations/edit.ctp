<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lignesStation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lignesStation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lignes Stations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="lignesStations form large-10 medium-9 columns">
    <?= $this->Form->create($lignesStation) ?>
    <fieldset>
        <legend><?= __('Edit Lignes Station') ?></legend>
        <?php
            echo $this->Form->input('ligne_id', ['options' => $lignes]);
            echo $this->Form->input('station_id', ['options' => $stations]);
            echo $this->Form->input('ordonation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
