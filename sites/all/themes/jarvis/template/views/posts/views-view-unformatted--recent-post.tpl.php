<div class="widget widget_recent_entries">
	<div class="widget-title"><?php print t('Recent Posts'); ?></div>
	<ul class="styled-list">
        <?php foreach ($rows as $id => $row): ?>
        <?php print $row; ?>
        <?php endforeach; ?>
    </ul>
</div>