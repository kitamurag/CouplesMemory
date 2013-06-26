<h1>新規登録</h1>
<p>登録するユーザ名とパスワードを入力して下さい。</p>
<?php 
echo $this->Form->create('User');
echo $this->Form->input('User.username');
echo $this->Form->input('User.password');	
echo $this->Form->end('登録する');
?>