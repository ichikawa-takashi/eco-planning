<?php
$modifier = !empty($args['bottom']) ? ' site-post-detail__share--bottom' : '';

$share_url   = get_permalink();
$share_title = get_the_title();

$share_links = [
    'X'                 => 'https://twitter.com/intent/tweet?url=' . rawurlencode($share_url) . '&text=' . rawurlencode($share_title),
    'Facebook'          => 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($share_url),
    'はてなブックマーク' => 'https://b.hatena.ne.jp/entry/panel/?url=' . rawurlencode($share_url) . '&title=' . rawurlencode($share_title),
    'LinkedIn'          => 'https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode($share_url),
    'LINE'              => 'https://social-plugins.line.me/lineit/share?url=' . rawurlencode($share_url),
];
$share_icons = [
    'X'                 => 'icon-x.png',
    'Facebook'          => 'icon-facebook.png',
    'はてなブックマーク' => 'icon-hatena-bookmark.png',
    'LinkedIn'          => 'icon-linkedin.png',
    'LINE'              => 'icon-line.png',
];
?>
<div class="site-post-detail__share<?php echo esc_attr($modifier); ?>" aria-label="この記事を共有">
  <?php foreach ($share_links as $label => $url) : ?>
    <a class="site-post-detail__share-link" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($label); ?>で共有"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/' . $share_icons[$label])); ?>" alt=""></a>
  <?php endforeach; ?>
</div>
