<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Buses Live'), ['action' => 'edit', $busesLive->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Buses Live'), ['action' => 'delete', $busesLive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busesLive->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Buses Live'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Buses Live'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lignes'), ['controller' => 'Lignes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ligne'), ['controller' => 'Lignes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="busesLive view large-10 medium-9 columns">
    <h2><?= h($busesLive->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Ligne') ?></h6>
            <p><?= $busesLive->has('ligne') ? $this->Html->link($busesLive->ligne->name, ['controller' => 'Lignes', 'action' => 'view', $busesLive->ligne->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Station') ?></h6>
            <p><?= $busesLive->has('station') ? $this->Html->link($busesLive->station->name, ['controller' => 'Stations', 'action' => 'view', $busesLive->station->id]) : '' ?></p>
            <h6 class="subheader"><?= __('State') ?></h6>
            <p><?= h($busesLive->state) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($busesLive->id) ?></p>
            <h6 class="subheader"><?= __('Lon') ?></h6>
            <p><?= $this->Number->format($busesLive->lon) ?></p>
            <h6 class="subheader"><?= __('Lat') ?></h6>
            <p><?= $this->Number->format($busesLive->lat) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('At') ?></h6>
            <p><?= h($busesLive->at) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($busesLive->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($busesLive->modified) ?></p>
        </div>
    </div>
</div>
