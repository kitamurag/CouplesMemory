<!-- add.ctp -->
<h1>UFOに誘拐された！？「誘拐レポート」を！</h1>
<p>様子を教えてください</p>
<?php 
echo $this->Form->create('AliensAbduction');
echo $this->Form->input('last_name');
echo $this->Form->input('first_name');
echo $this->Form->input('when_it_happened');
echo $this->Form->end('誘拐レポートを送信する');
 ?>