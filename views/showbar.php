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

<?php if($data[PLUGIN_NAME_VAR]['url_facebook']) { ?>
<div class="fsb facebook">
<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode($data[PLUGIN_NAME_VAR]['url_facebook']); ?>&amp;width&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=142160389133186" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
</div>
<?php } ?>

<?php if($data[PLUGIN_NAME_VAR]['url_googleplus']) { ?>
<div class="fsb googleplus">
<a href="<?php echo $data[PLUGIN_NAME_VAR]['url_googleplus']; ?>"
   rel="publisher" target="_top" style="text-decoration:none;">
<img src="//ssl.gstatic.com/images/icons/gplus-32.png" alt="Google+" style="border:0;width:32px;height:32px;"/>
</a>
</div>
<?php } ?>

<?php if($data[PLUGIN_NAME_VAR]['url_pinterest']) { ?>
<div class="fsb pinterest">
<a data-pin-do="buttonFollow" href="<?php echo $data[PLUGIN_NAME_VAR]['url_pinterest']; ?>">Follow</a>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
</div>
<?php } ?>

<div class="close-sidebar"> 
  <a class="image-close-sidebar"></a>
</div>

</div>
</div>