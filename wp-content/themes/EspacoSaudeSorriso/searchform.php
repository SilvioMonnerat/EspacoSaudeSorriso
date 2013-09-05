<?php
/* ------------------------------------------------------------------------ */
/* Theme's Search Form
/* ------------------------------------------------------------------------ */
?>
<script type="text/javascript">var active_color = '#adadaa'; // Colour of user provided textvar inactive_color = '#ccc'; // Colour of default text/** * No need to modify anything below this line */$(document).ready(function() {  $("input.default-value").css("color", inactive_color);  var default_values = new Array();  $("input.default-value").focus(function() {    if (!default_values[this.id]) {      default_values[this.id] = this.value;    }    if (this.value == default_values[this.id]) {      this.value = '';      this.style.color = active_color;    }    $(this).blur(function() {      if (this.value == '') {        this.style.color = inactive_color;        this.value = default_values[this.id];      }    });  });});</script>
<div id="search">
  <form method="get" action="<?php echo home_url(); ?>/">
    <input id="s" name="s" type="text" size="25"  maxlength="128" onblur="this.value = this.value || this.defaultValue; this.style.color = '#d1d1cd';" onfocus="this.value=''; this.style.color = '#adadaa';" value="<?php _e('looking for something?', 'framework') ?> <?php the_search_query(); ?>" />
    <input id="searchsubmit" type="submit" value="<?php _e('Search', 'framework'); ?>" />
  </form>
</div>