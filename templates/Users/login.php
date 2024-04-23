<!-- in /templates/Users/login.php -->
<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your Username and Password') ?></legend>
        <?= $this->Form->control('Username', ['required' => true]) ?>
        <?= $this->Form->control('Password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('login')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("Add User", ['action' => 'add']) ?>
</div>