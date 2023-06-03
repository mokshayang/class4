<h2 class="ct">最新消息</h2>
<table class="all">
    <tr class="ct tt">
        <td>標題</td>
    </tr>
    <?php
      $ads = $Ad->all(['sh'=>1]);
      foreach($ads as $ad){    
    ?>
    <tr class="ct pp">
        <td><?=$ad['text']?></td>
    </tr>
    <?php } ?>
</table>