<div class="widget tags">
	<div class="widget-title"><?php print t('Tags'); ?></div>
	<ul class="tags-list styled-list">
        <?php foreach ($rows as $id => $row): ?>
        <?php print $row; ?>
        <?php endforeach; ?>
    </ul>
</div>