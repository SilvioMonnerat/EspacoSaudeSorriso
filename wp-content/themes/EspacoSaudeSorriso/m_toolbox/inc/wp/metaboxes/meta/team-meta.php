<div id="meta_control">
	<p>
		<?php $metabox->the_field('name'); ?>
		<label for="<?php $metabox->the_name(); ?>">Nome: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
	
	<p>
		<?php $metabox->the_field('cro'); ?>
		<label for="<?php $metabox->the_name(); ?>">CRO: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
	
	<div class="meta-textarea">
		<?php $metabox->the_field('descricao'); ?>
		<label for="<?php $metabox->the_name(); ?>">Descrição: </label>
		<textarea name="<?php $metabox->the_name(); ?>" rows="6"><?php $metabox->the_value(); ?></textarea>
	</div>

	<p>
		<?php $metabox->the_field('email'); ?>
		<label for="<?php $metabox->the_name(); ?>">Email para Contato: </label>
		<input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>"  />
	</p>
 
 	<div class="clear"></div>
</div>