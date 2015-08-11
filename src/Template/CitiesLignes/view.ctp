<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Cities Ligne'), ['action' => 'edit', $citiesLigne->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cities Ligne'), ['action' => 'delete', $citiesLigne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $citiesLigne->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities Lignes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cities Ligne'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="citiesLignes view large-10 medium-9 columns">
    <h2><?= h($citiesLigne->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Ligne') ?></h6>
            <p><?= $citiesLigne->has('ligne') ? $this->Html->link($citiesLigne->ligne->name, ['controller' => 'Lignes', 'action' => 'view', $citiesLigne->ligne->id]) : '' ?></p>
            <h6 class="subheader"><?= __('City') ?></h6>
            <p><?= $citiesLigne->has('city') ? $this->Html->link($citiesLigne->city->name, ['controller' => 'Cities', 'action' => 'view', $citiesLigne->city->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($citiesLigne->id) ?></p>
            <h6 class="subheader"><?= __('Ordonation') ?></h6>
            <p><?= $this->Number->format($citiesLigne->ordonation) ?></p>
        </div>
    </div>
</div>
