<style>
.floatsocialbar {background: <?php echo $data[PLUGIN_NAME_VAR]['background']; ?>;}
.floatsocialbar .message{color: <?php echo $data[PLUGIN_NAME_VAR]['colortext']; ?>;}
</style>

<div align="center" class="floatsocialbar">
<div class="contentbar">
<div class="message"><?php echo $data[PLUGIN_NAME_VAR]['message']; ?></div>

<?php if($data[PLUGIN_NAME_VAR]['url_twitter']) { ?>
<div class="fsb">
<a href="<?php echo $data[PLUGIN_NAME_VAR]['url_twitter']; ?>" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
<?php } ?>

<div class="close-sidebar"> 
  <a class="image-close-sidebar"></a>
</div>

</div>
</div>