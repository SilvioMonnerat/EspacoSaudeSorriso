<div id="meta_control">
			
	<p>
		<?php $metabox->the_field('data'); ?>
		<label for="<?php $metabox->the_name(); ?>">Data de Apresentação: ie.  dd/mm</label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
	
	<p>
		<?php $metabox->the_field('hora'); ?>
		<label for="<?php $metabox->the_name(); ?>">Hora: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>		
	
	<div class="meta-textarea">
		<?php $metabox->the_field('endereco'); ?>
		<label for="<?php $metabox->the_name(); ?>">Endereço: </label>
		<textarea name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
	</div>
	
 	<div class="clear"></div>
</div>