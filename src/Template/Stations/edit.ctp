<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $station->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $station->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="stations form large-10 medium-9 columns">
    <?= $this->Form->create($station) ?>
    <fieldset>
        <legend><?= __('Edit Station') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('direction');
            echo $this->Form->input('has_twin');
            echo $this->Form->input('r');
            echo $this->Form->input('lon');
            echo $this->Form->input('lat');
            echo $this->Form->input('city_id', ['options' => $cities]);
            echo $this->Form->input('lignes._ids', ['options' => $lignes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
