<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
?>

<?php
$this->assign('title', __('Photo'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Photos'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($photo->title) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Title') ?></th>
                <td><?= h($photo->title) ?></td>
            </tr>
            <tr>
                <th><?= __('Location File') ?></th>
                <td><?= h($photo->Location_File) ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $photo->has('user') ? $this->Html->link($photo->user->Username, ['controller' => 'Users', 'action' => 'view', $photo->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Album') ?></th>
                <td><?= $photo->has('album') ? $this->Html->link($photo->album->Name, ['controller' => 'Albums', 'action' => 'view', $photo->album->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($photo->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Date') ?></th>
                <td><?= h($photo->Date) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $photo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $photo->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Description') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($photo->Description)); ?>
    </div>
</div>
