<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $citiesLigne->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $citiesLigne->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cities Lignes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="citiesLignes form large-10 medium-9 columns">
    <?= $this->Form->create($citiesLigne) ?>
    <fieldset>
        <legend><?= __('Edit Cities Ligne') ?></legend>
        <?php
            echo $this->Form->input('ligne_id', ['options' => $lignes]);
            echo $this->Form->input('city_id', ['options' => $cities]);
            echo $this->Form->input('ordonation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
