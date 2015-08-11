<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="cities form large-10 medium-9 columns">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Add City') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('type');
            echo $this->Form->input('code_postal');
            echo $this->Form->input('ligne_count');
            echo $this->Form->input('lignes._ids', ['options' => $lignes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
