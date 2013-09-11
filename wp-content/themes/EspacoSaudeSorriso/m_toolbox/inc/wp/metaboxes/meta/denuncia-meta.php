<div id="meta_control">
	<p>
		<?php $metabox->the_field('autor'); ?>
		<label for="<?php $metabox->the_name(); ?>">Autor: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
	
	<p>
		<?php $metabox->the_field('linkDoGoogleMaps'); ?>
		<label for="<?php $metabox->the_name(); ?>">Link do Google Maps: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
	
	<div class="meta-textarea">
		<?php $metabox->the_field('endereco'); ?>
		<label for="<?php $metabox->the_name(); ?>">Endereço: </label>
		<textarea name="<?php $metabox->the_name(); ?>" rows="6"><?php $metabox->the_value(); ?></textarea>
	</div>
	
	<div class="meta-textarea">
		<?php $metabox->the_field('descricao'); ?>
		<label for="<?php $metabox->the_name(); ?>">Descrição: </label>
		<textarea name="<?php $metabox->the_name(); ?>" rows="6"><?php $metabox->the_value(); ?></textarea>
	</div>
	
	<div class="meta-textarea">
		<?php $metabox->the_field('solucao'); ?>
		<label for="<?php $metabox->the_name(); ?>">Solução: </label>
		<textarea name="<?php $metabox->the_name(); ?>" rows="6"><?php $metabox->the_value(); ?></textarea>
	</div>
 
 	<div class="clear"></div>
</div>