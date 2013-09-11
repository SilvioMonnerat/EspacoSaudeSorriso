<div id="meta_control">	
	<p>
		<?php $metabox->the_field('num'); ?>
		<label for="<?php $metabox->the_name(); ?>"># do Proposta: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p> 
	<p>
		<?php $metabox->the_field('videoURL'); ?>
		<label for="<?php $metabox->the_name(); ?>">URL de Vídeo: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p> 
	
	<div class="meta-textarea">
		<?php $metabox->the_field('endereco'); ?>
		<label for="<?php $mb->the_name(); ?>">Endreço: </label>
		<textarea name="<?php $mb->the_name(); ?>" rows="6"><?php $mb->the_value(); ?></textarea>
	</div>
 
 	<div class="clear"></div>
</div>