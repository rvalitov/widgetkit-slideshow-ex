<?php
/*
SlideshowEx plugin for Widgetkit 2.
Author: Ramil Valitov
E-mail: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slideshow-ex
*/

require_once(__DIR__.'/WidgetkitExPlugin.php');
use WidgetkitEx\SlideshowEx\WidgetkitExPlugin;

$cssprefix=WidgetkitExPlugin::getCSSPrefix($app);

// Nav
$nav = '';
$nav_item = '';

switch ($settings['nav']) {
    case 'dotnav':
        $nav  = '{wk}-dotnav';
        $nav .= ($settings['nav_overlay'] && $settings['nav_contrast']) ? ' {wk}-dotnav-contrast' : '';
        break;
    case 'thumbnails':
        $nav = '{wk}-thumbnav';
        $nav_item = ($settings['nav_align'] == 'justify') ? ' class="{wk}-width-1-' . count($items) . '"' : '';
        break;
}

// Alignment
$nav .= ($settings['nav_align'] != 'justify') ? ' {wk}-flex-' . $settings['nav_align'] : '';
$nav = str_replace('{wk}', $cssprefix, $nav);
?>

<ul class="<?php echo $nav; ?>">
<?php foreach ($items as $i => $item) :

        // Alternative Media Field
        $field = 'media';
        if ($settings['thumbnail_alt']) {
            foreach ($item as $media_field) {
                if (($item[$media_field] != $item['media']) && ($item->type($media_field) == 'image')) {
                    $field = $media_field;
                    break;
                }
            }
        }
        
        // Thumbnails
        $thumbnail = '';
        if ($settings['nav'] == 'thumbnails' &&  ($item->type($field) == 'image' || $item[$field . '.poster'])) {

            $attrs           = array();
            $width           = ($settings['thumbnail_width'] != 'auto') ? $settings['thumbnail_width'] : $item[$field . '.width'];
            $height          = ($settings['thumbnail_height'] != 'auto') ? $settings['thumbnail_height'] : $item[$field . '.height'];

            $attrs['alt']    = strip_tags($item['title']);
            $attrs['width']  = $width;
            $attrs['height'] = $height;

            if ($settings['thumbnail_width'] != 'auto' || $settings['thumbnail_height'] != 'auto') {
                $thumbnail = $item->thumbnail($item->type($field) == 'image' ? $field : $field . '.poster', $width, $height, $attrs);
            } else {
                $thumbnail = $item->media($item->type($field) == 'image' ? $field : $field . '.poster', $attrs);
            }
        }

    ?>
    <li<?php echo $nav_item; ?> data-<?php echo $cssprefix?>-slideshow-item="<?php echo $i; ?>">
        <a <?php if ($settings['nav_mode']=='lightbox'): echo $items['lightbox_link']; elseif ($settings['nav_mode']=='lightbox_active'):?>href="#" onclick="event.preventDefault();event.stopPropagation();jQuery('#<?php echo $settings['unique_id'];?> ul.uk-slideshow > li.uk-active > a').click();"<?php else:?>href="#"<?php endif;?>>
            <?php echo ($thumbnail) ? $thumbnail : $item['title']; ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>