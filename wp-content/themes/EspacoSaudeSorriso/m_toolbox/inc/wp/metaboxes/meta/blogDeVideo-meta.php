<div id="meta_control">

	<p>
		<?php $metabox->the_field('title'); ?>
		<label for="<?php $metabox->the_name(); ?>">Título do vídeo em destaque: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
	
	<p>
		<?php $metabox->the_field('videoURL'); ?>
		<label for="<?php $metabox->the_name(); ?>">URL de Vídeo: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
 
 	<div class="clear"></div>
</div>