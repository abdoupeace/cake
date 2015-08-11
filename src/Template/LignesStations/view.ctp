<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Lignes Station'), ['action' => 'edit', $lignesStation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lignes Station'), ['action' => 'delete', $lignesStation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignesStation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lignes Stations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lignes Station'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="lignesStations view large-10 medium-9 columns">
    <h2><?= h($lignesStation->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Ligne') ?></h6>
            <p><?= $lignesStation->has('ligne') ? $this->Html->link($lignesStation->ligne->name, ['controller' => 'Lignes', 'action' => 'view', $lignesStation->ligne->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Station') ?></h6>
            <p><?= $lignesStation->has('station') ? $this->Html->link($lignesStation->station->name, ['controller' => 'Stations', 'action' => 'view', $lignesStation->station->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($lignesStation->id) ?></p>
            <h6 class="subheader"><?= __('Ordonation') ?></h6>
            <p><?= $this->Number->format($lignesStation->ordonation) ?></p>
        </div>
    </div>
</div>
