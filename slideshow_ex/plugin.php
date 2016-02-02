<?php
/*
SlideshowEx plugin for Widgetkit 2.
Author: Ramil Valitov
E-mail: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slideshow-ex
*/

return array(

    'name' => 'widget/slideshow_ex',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slideshow_ex',
        'label' => 'SlideshowEx',
        'core'  => true,
        'icon'  => 'plugins/widgets/slideshow_ex/widget.svg',
        'view'  => 'plugins/widgets/slideshow_ex/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'nav'                => 'dotnav',
            'nav_overlay'        => true,
            'nav_align'          => 'center',
            'thumbnail_width'    => '70',
            'thumbnail_height'   => '70',
            'thumbnail_alt'      => false,
            'slidenav'           => 'default',
            'nav_contrast'       => true,
            'animation'          => 'fade',
            'slices'             => '15',
            'duration'           => '500',
            'autoplay'           => false,
            'interval'           => '3000',
            'autoplay_pause'     => true,
            'kenburns'           => false,
            'kenburns_animation' => '',
            'kenburns_duration'  => '15',
            'fullscreen'         => false,
            'min_height'         => '300',

            'media'              => true,
            'image_width'        => 'auto',
            'image_height'       => 'auto',
            'overlay'            => 'none',
            'overlay_animation'  => 'fade',
            'overlay_background' => true,

            'title'              => true,
            'content'            => true,
            'title_size'         => 'h3',
            'content_size'       => '',
            'link'               => true,
            'link_style'         => 'button',
            'link_text'          => 'Read more',
            'badge'              => true,
            'badge_style'        => 'badge',
			
			'image_link'		=> false,
			'overlay_link'		=> false,

            'link_target'        => false,
            'class'              => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
            $app['scripts']->add('uikit-slideshow', 'vendor/assets/uikit/js/components/slideshow.min.js', array('uikit'));
            $app['scripts']->add('uikit-slideshow-fx', 'vendor/assets/uikit/js/components/slideshow-fx.min.js', array('uikit'));
			//Adding private CSS:
			$app['styles']->add('ram-slideshow-ex', 'plugins/widgets/slideshow_ex/css/slideshow-ex.css', array('widgetkit-application'));
        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slideshow_ex.edit', 'plugins/widgets/slideshow_ex/views/edit.php', true);
			//Adding tooltip:
			$app['scripts']->add('uikit-tooltip', 'vendor/assets/uikit/js/components/tooltip.min.js', array('uikit'));
			$app['styles']->add('uikit-tooltip', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/tooltip.min.css', array('uikit'));
			//Marked:
			$app['scripts']->add('marked', 'plugins/widgets/slideshow_ex/assets/marked.min.js', array('uikit'));
			//Updater:
			$app['scripts']->add('slideshow_ex.updater', 'plugins/widgets/slideshow_ex/assets/updater.js', array('slideshow_ex'));
        }

    )

);
