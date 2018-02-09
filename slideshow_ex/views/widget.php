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

// JS Options
$options = array();
$options[] = ($settings['animation'] != 'fade') ? 'animation: \'' . $settings['animation'] . '\'' : '';
$options[] = ($settings['duration'] != '500') ? 'duration: ' . $settings['duration'] : '';
$options[] = ($settings['slices'] != '15') ? 'slices: ' . $settings['slices'] : '';
$options[] = ($settings['autoplay']) ? 'autoplay: true ' : '';
$options[] = ($settings['interval'] != '3000') ? 'autoplayInterval: ' . $settings['interval'] : '';
$options[] = ($settings['autoplay_pause']) ? '' : 'pauseOnHover: false';
if ($settings['kenburns'] && $settings['kenburns_duration']) {
    $kenburns_animation = ($settings['kenburns_animation']) ? ', kenburnsanimations: \'' . $settings['kenburns_animation'] . '\'' : '';
    $options[] = 'kenburns: \'' . $settings['kenburns_duration'] . 's\'' . $kenburns_animation;
}

$options = '{'.implode(',', array_filter($options)).'}';

//Accessibility options
$WCAG_prev = $settings['WCAG_prev'] ? $settings['WCAG_prev'] : "Previous slide";
$WCAG_next = $settings['WCAG_next'] ? $settings['WCAG_next'] : "Next slide";
$WCAG_close = $settings['WCAG_close'] ? $settings['WCAG_close'] : "Close Lightbox";
$WCAG_open_lightbox = $settings['WCAG_open_lightbox'] ? $settings['WCAG_open_lightbox'] : "Open in Lightbox mode";

// Overlay
$overlay = '{wk}-overlay-panel';
switch ($settings['overlay']) {
    case 'center':
        $overlay .= ' {wk}-flex {wk}-flex-center {wk}-flex-middle {wk}-text-center';
        break;
    case 'middle-left':
        $overlay .= ' {wk}-flex {wk}-flex-middle';
        break;
    default:
        $overlay .= ' {wk}-overlay-' . $settings['overlay'];
}

$overlay .= $settings['overlay_background'] ? ' {wk}-overlay-background' : '';

if ($settings['overlay_animation'] == 'slide' && !in_array($settings['overlay'], array('center', 'middle-left'))) {
    $overlay .= ' {wk}-overlay-slide-' . $settings['overlay'];
} else {
    $overlay .= ' {wk}-overlay-fade';
}
$overlay = str_replace('{wk}', $cssprefix, $overlay);

// Title Size
switch ($settings['title_size']) {
    case 'large':
        $title_size = '{wk}-heading-large';
        break;
    default:
        $title_size = '{wk}-' . $settings['title_size'];
}
$title_size = str_replace('{wk}', $cssprefix, $title_size);

// Content Size
switch ($settings['content_size']) {
    case 'large':
        $content_size = '{wk}-text-large';
        break;
    case 'h2':
    case 'h3':
    case 'h4':
        $content_size = '{wk}-' . $settings['content_size'];
        break;
    default:
        $content_size = '';
}
$content_size = str_replace('{wk}', $cssprefix, $content_size);

// Link Style
switch ($settings['link_style']) {
    case 'button':
        $link_style = '{wk}-button';
        break;
    case 'primary':
        $link_style = '{wk}-button {wk}-button-primary';
        break;
    case 'button-large':
        $link_style = '{wk}-button {wk}-button-large';
        break;
    case 'primary-large':
        $link_style = '{wk}-button {wk}-button-large {wk}-button-primary';
        break;
    case 'button-link':
        $link_style = '{wk}-button {wk}-button-link';
        break;
    default:
        $link_style = '';
}
$link_style = str_replace('{wk}', $cssprefix, $link_style);

// Link Target
$link_target = ($settings['link_target']) ? ' target="_blank"' : '';

// Badge Style
switch ($settings['badge_style']) {
    case 'badge':
        $badge_style = '{wk}-badge';
        break;
    case 'success':
        $badge_style = '{wk}-badge {wk}-badge-success';
        break;
    case 'warning':
        $badge_style = '{wk}-badge {wk}-badge-warning';
        break;
    case 'danger':
        $badge_style = '{wk}-badge {wk}-badge-danger';
        break;
    case 'text-muted':
        $badge_style  = '{wk}-text-muted';
        break;
    case 'text-primary':
        $badge_style  = '{wk}-text-primary';
        break;
}
$badge_style = str_replace('{wk}', $cssprefix, $badge_style);

// Position Relative
if ($settings['slidenav'] == 'default') {
    $position_relative = '{wk}-slidenav-position';
} else {
    $position_relative = '{wk}-position-relative';
}
$position_relative = str_replace('{wk}', $cssprefix, $position_relative);

// Custom Class
$class = $settings['class'] ? ' class="' . $settings['class'] . '"' : '';

$lightbox_class=uniqid('wk-slideshowex');
$settings['unique_id'] = $lightbox_class;

if ($settings['lightbox']=='lightbox')
	//Creating unique $groupcode variable to be used as a lightbox group id.
	$groupcode=uniqid('wk-slideshow-lightbox');

?>

<?php if ($settings['lightbox']=='lightbox' && $settings['lightbox_arrows']=='always') : ?>
<style>
    .<?php echo $lightbox_class;?> .uk-lightbox-content a{
        display: block;
    }
</style>
<?php endif ?>
<?php
/*
 * Support for CSS touch media query: https://caniuse.com/#feat=css-media-interaction
 */
if ($settings['lightbox']=='lightbox' && $settings['lightbox_arrows']=='touch') : ?>
    <style>
        @media (pointer:coarse) {
            .<?php echo $lightbox_class;?> .uk-lightbox-content a {
                display: block;
            }
        }
    </style>
<?php endif ?>

<?php if ($settings['lightbox']=='lightbox' && $settings['lightbox_areas']) : ?>
    <style>
        .<?php echo $lightbox_class;?> .uk-lightbox-content a {
            display: block;
            height: 100%;
            top: 0;
            margin-top: 0;
            width: <?php echo $settings['lightbox_area_size'];?>;
        }
        .<?php echo $lightbox_class;?> .uk-slidenav-previous {
            left: 0 !important;
        }
        .<?php echo $lightbox_class;?> .uk-slidenav-next {
            right: 0 !important;
        }
        .<?php echo $lightbox_class;?> .uk-slidenav-previous::before {
            position: absolute;
            top: 50%;
            left: 25px;
            margin-top: -25px;
        }
        .<?php echo $lightbox_class;?> .uk-slidenav-next::before {
            position: absolute;
            top: 50%;
            right: 25px;
            margin-top: -25px;
        }
    </style>
<?php endif ?>

<div<?php echo $class; ?> data-<?php echo $cssprefix?>-slideshow="<?php echo $options; ?>" id="<?php echo $lightbox_class;?>">

    <div class="<?php echo $position_relative; ?>">

        <ul class="<?php echo $cssprefix?>-slideshow<?php if ($settings['fullscreen']) echo ' '. $cssprefix. '-slideshow-fullscreen'; ?><?php if ($settings['overlay'] != 'none') echo ' '. $cssprefix. '-overlay-active'; ?>">
        <?php foreach ($items as $item_id => $item) :

                // Media Type
                $attrs  = array('class' => '');
                $width  = $item['media.width'];
                $height = $item['media.height'];

                if ($item->type('media') == 'image') {
                    $attrs['alt'] = strip_tags($item['title']);
                    $width  = ($settings['image_width'] != 'auto') ? $settings['image_width'] : '';
                    $height = ($settings['image_height'] != 'auto') ? $settings['image_height'] : '';
                }

                if ($item->type('media') == 'video') {
                    $attrs['autoplay'] = true;
                    $attrs['loop']     = true;
                    $attrs['muted']    = true;
                    $attrs['class']   .= '{wk}-cover-object {wk}-position-absolute';
                    $attrs['class']   .= ($item['media.poster']) ? ' {wk}-hidden-touch' : '';
                }

                $attrs['width']  = ($width) ? $width : '';
                $attrs['height'] = ($height) ? $height : '';

                if (($item->type('media') == 'image') && ($settings['image_width'] != 'auto' || $settings['image_height'] != 'auto')) {
                    $media = $item->thumbnail('media', $width, $height, $attrs);
                } else {
                    $media = $item->media('media', $attrs);
                }

            ?>

            <li style="min-height: <?php echo $settings['min_height']; ?>px;">

                <?php if ($item['media'] && $settings['media']) : ?>

					<?php echo $media; ?>

                    <?php if ($item['media.poster']) : ?>
                    <div class="<?php echo $cssprefix?>-cover-background <?php echo $cssprefix?>-position-cover <?php echo $cssprefix?>-hidden-notouch" style="background-image: url(<?php echo $item['media.poster'] ?>);"></div>
                    <?php endif ?>

					<?php
					$the_link='';
					if ($settings['lightbox']=='lightbox'){
                        $button_class=", button: ";
					    if ($settings['lightbox']=='lightbox' && $settings['lightbox_arrows']=='')
					        $button_class.="'uk-hidden-touch'";
					    else
                            $button_class.="''";
						$the_link.='data-{wk}-lightboxex="{group:\''.$groupcode.'\', class: \''.$lightbox_class.'\''.$button_class.', WCAG_prev: \''.$WCAG_prev.'\', WCAG_next: \''.$WCAG_next.'\', WCAG_close: \''.$WCAG_close.'\', WCAG_alt: \''.$attrs['alt'].'\'}" href="'.$item->get('media').'"';
					}
					else
						if ($item['link']) {
							$the_link.='href="'.$item->escape('link').'"'.$link_target;
							if ( ($settings['link']) && ($link_style) && (!$settings['slide_link']) )
								$the_link.=' class="slideshow-ex ' . $link_style . '"';
						}

				    if (strlen($the_link)>0){
                        $items[$item_id]['lightbox_link'] = $the_link;
                        if ($settings['slide_link']){
                            $the_link.=' class="slideshow-ex {wk}-position-cover"';
                            $the_link = str_replace('{wk}', $cssprefix, $the_link);
                            echo '<a ' . $the_link . '><span class="uk-hidden">' . $WCAG_open_lightbox . '</span>';
                        }
                    }
					?>
					
                    <?php if ($settings['overlay'] != 'none' && (($item['title'] && $settings['title']) || ($item['content'] && $settings['content']) || ($item['link'] && ($settings['link'] || $settings['overlay_link'])))) : ?>
                    <div class="<?php echo $overlay; ?>">

                        <?php if (in_array($settings['overlay'], array('center', 'middle-left'))) : ?>
                        <div>
                        <?php endif; ?>

                        <?php if ($item['title'] && $settings['title']) : ?>
                        <h3 class="<?php echo $title_size; ?>">

                            <?php echo $item['title']; ?>

                            <?php if ($item['badge'] && $settings['badge']) : ?>
                            <span class="<?php echo $cssprefix?>-margin-small-left <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></span>
                            <?php endif; ?>

                        </h3>
                        <?php endif; ?>

                        <?php if ($item['content'] && $settings['content']) : ?>
                        <div class="<?php echo $content_size; ?> <?php echo $cssprefix?>-margin"><?php
						if ($item['link'] && $settings['slide_link'])
							/*
							We must strip <a> tags from the text, otherwise such tags will corrupt everything and break our approach.
							Our approach is to use the HTML5 <a> tag on the whole <div> - this is allowed in HTML5 (before that <a> tags couldn't be set on block elements). 
							However, using the tests I found out that in this case you can't have other <a> tags inside the <div> - probably it's some kind of limitation of current web browsers or engines.
							That's the reason we must strip the <a> tags.
							*/
							echo preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $item['content']);
						else 
							echo $item['content']; ?></div>
                        <?php endif; ?>

                        <?php if ($item['link'] && $settings['link'] && (!$settings['slide_link']) ) : ?>
                        <p><a <?php echo $the_link; ?>><?php echo $app['translator']->trans($settings['link_text']); ?></a></p>
                        <?php endif; ?>

                        <?php if (in_array($settings['overlay'], array('center', 'middle-left'))) : ?>
                        </div>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>
					
					<?php if ( ($settings['slide_link']) && (strlen($the_link)>0) ):?>
					</a>
					<?php endif; ?>

                <?php elseif(($item['title'] && $settings['title']) || ($item['content'] && $settings['content'])) : ?>

                    <?php if ($item['title'] && $settings['title']) : ?>
                    <h3 class="<?php echo $title_size; ?>">

                        <?php echo $item['title']; ?>

                        <?php if ($item['badge'] && $settings['badge']) : ?>
                        <span class="<?php echo $cssprefix?>-margin-small-left <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></span>
                        <?php endif; ?>

                    </h3>
                    <?php endif; ?>

                    <?php if ($item['content'] && $settings['content']) : ?>
                    <div class="<?php echo $cssprefix?>-margin"><?php echo $item['content']; ?></div>
                    <?php endif; ?>
					<?php
					if ($item['link'] && $settings['link']){
						$the_link='';
						if ($settings['slide_link'])
							$the_link.=' class="slideshow-ex {wk}-position-cover"';
						else
							if ($link_style)
								$the_link.=' class="slideshow-ex ' . $link_style . '"';
						$the_link = str_replace('{wk}', $cssprefix, $the_link);
						echo '<p><a '.$the_link.' href="'.$item->escape('link').'"'.$link_target.'>'.(($settings['slide_link'])? '' : $app['translator']->trans($settings['link_text'])).'</a></p>';
					}
					?>

                <?php endif; ?>

            </li>

        <?php endforeach; ?>
        </ul>

        <?php if (in_array($settings['slidenav'], array('top-left', 'top-right', 'bottom-left', 'bottom-right'))) : ?>
        <div class="<?php echo $cssprefix?>-position-<?php echo $settings['slidenav']; ?> <?php echo $cssprefix?>-margin <?php echo $cssprefix?>-margin-left <?php echo $cssprefix?>-margin-right">
            <div class="<?php echo $cssprefix?>-grid <?php echo $cssprefix?>-grid-small">
                <div><a href="#" class="<?php echo $cssprefix?>-slidenav <?php if ($settings['nav_contrast']) echo $cssprefix.'-slidenav-contrast'; ?> <?php echo $cssprefix?>-slidenav-previous" data-<?php echo $cssprefix?>-slideshow-item="previous"><span class="uk-hidden"><?php echo $WCAG_prev; ?></span></a></div>
                <div><a href="#" class="<?php echo $cssprefix?>-slidenav <?php if ($settings['nav_contrast']) echo $cssprefix.'-slidenav-contrast'; ?> <?php echo $cssprefix?>-slidenav-next" data-<?php echo $cssprefix?>-slideshow-item="next"><span class="uk-hidden"><?php echo $WCAG_next; ?></span></a></div>
            </div>
        </div>
        <?php elseif ($settings['slidenav'] == 'default') : ?>
            <a href="#" class="<?php echo $cssprefix?>-slidenav <?php if ($settings['nav_contrast']) echo $cssprefix.'-slidenav-contrast'; ?> <?php echo $cssprefix?>-slidenav-previous <?php echo $cssprefix?>-hidden-touch" data-<?php echo $cssprefix?>-slideshow-item="previous"><span class="uk-hidden"><?php echo $WCAG_prev; ?></span></a>
            <a href="#" class="<?php echo $cssprefix?>-slidenav <?php if ($settings['nav_contrast']) echo $cssprefix.'-slidenav-contrast'; ?> <?php echo $cssprefix?>-slidenav-next <?php echo $cssprefix?>-hidden-touch" data-<?php echo $cssprefix?>-slideshow-item="next"><span class="uk-hidden"><?php echo $WCAG_next; ?></span></a>
        <?php endif ?>

        <?php if ($settings['nav_overlay'] && ($settings['nav'] != 'none')) : ?>
        <div class="<?php echo $cssprefix?>-overlay-panel <?php echo $cssprefix?>-overlay-bottom">
            <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_nav.php', compact('items', 'settings')); ?>
        </div>
        <?php endif ?>

    </div>

    <?php if (!$settings['nav_overlay'] && ($settings['nav'] != 'none')) : ?>
    <div class="<?php echo $cssprefix?>-margin">
        <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_nav.php', compact('items', 'settings')); ?>
    </div>
    <?php endif ?>

</div>
