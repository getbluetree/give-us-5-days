<?php 
$Title = $fields['title']->content; 
$Link = $fields['field_clients_link']->content;
$Logo = $fields['field_clients_logo']->content;

?>

<a href="<?php print $Link; ?>" target="_blank" title="<?php print $Title; ?>" class="clients"><?php print $Logo; ?></a>