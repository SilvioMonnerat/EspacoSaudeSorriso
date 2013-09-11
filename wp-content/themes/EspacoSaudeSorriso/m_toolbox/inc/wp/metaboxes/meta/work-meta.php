<div id="meta_control">
		
	<label>Autor:</label><br/>
	
	<?php $mb->the_field('autor'); ?>
	<select name="<?php $mb->the_name(); ?>">
		<option value="Daniel Marques"<?php $mb->the_select_state('Daniel Marques'); ?>>Daniel Marques</option>
	</select>	
	
	<p>
		<?php $metabox->the_field('title'); ?>
		<label for="<?php $metabox->the_name(); ?>">Titulo do Projeto: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
		
	<p>
		<?php $metabox->the_field('data'); ?>
		<label for="<?php $metabox->the_name(); ?>">Data de Inicio: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
	
	<div class="meta-textarea">
		<?php $metabox->the_field('descricao'); ?>
		<label for="<?php $metabox->the_name(); ?>">Descrição: </label>
		<textarea name="<?php $mb->the_name(); ?>" rows="6"><?php $mb->the_value(); ?></textarea>
	</div>
	
 	<div class="clear"></div>
</div>