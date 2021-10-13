<?php
/*
SlideshowEx plugin for Widgetkit 2.
Author: Ramil Valitov
E-mail: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slideshow-ex
*/

require_once __DIR__.'/views/WidgetkitExPlugin.php';
use WidgetkitEx\SlideshowEx\WidgetkitExPlugin;

return [

    'name' => 'widget/slideshow_ex',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'plugin_version' => 'v1.4.2',

    'plugin_date' => '13/10/2021',

    'plugin_logo' => 'https://raw.githubusercontent.com/wiki/rvalitov/widgetkit-slideshow-ex/images/logo.jpg',

    'plugin_wiki' => 'https://github.com/rvalitov/widgetkit-slideshow-ex/wiki',

    'config' => [

        'name'     => 'slideshow_ex',
        'label'    => 'SlideshowEx',
        'core'     => true,
        'icon'     => 'plugins/widgets/slideshow_ex/widget.svg',
        'view'     => 'plugins/widgets/slideshow_ex/views/widget.php',
        'item'     => ['title', 'content', 'media'],
        'settings' => [
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

            'slide_link'		       => false,
            'lightbox'			        => '',
            'lightbox_arrows'    => '',
            'lightbox_areas'     => false,
            'lightbox_area_size' => '25%',
            'nav_mode'           => '',

            //Accessibility options
            'WCAG_prev'          => 'Previous slide',
            'WCAG_next'          => 'Next slide',
            'WCAG_close'         => 'Close Lightbox',
            'WCAG_open_lightbox' => 'Open in Lightbox mode',

            'link_target'        => false,
            'class'              => '',
        ],

    ],

    'events' => [

        'init.site' => function ($event, $app) {
            $uikit = (WidgetkitExPlugin::getCSSPrefix($app) == 'uk') ? 'uikit' : 'uikit2';
            $app['scripts']->add('uikit-slideshow', 'vendor/assets/uikit/js/components/slideshow.min.js', [$uikit]);
            $app['scripts']->add('uikit-lightbox-ex', 'plugins/widgets/slideshow_ex/assets/lightbox-ex' . ((WidgetkitExPlugin::getCSSPrefix($app) == 'uk') ? '' : '-wk') . '.js', [$uikit]);
            $app['scripts']->add('uikit-slideshow-fx', 'vendor/assets/uikit/js/components/slideshow-fx.min.js', [$uikit]);
            //Adding private CSS:
            $app['styles']->add('ram-slideshow-ex', 'plugins/widgets/slideshow_ex/css/slideshow-ex.css', [$uikit]);
        },

        'init.admin' => function ($event, $app) {
            $plugin = new WidgetkitExPlugin($app);
            $uikit = ($plugin->getCSSPrefix($app) == 'uk') ? 'uikit' : 'uikit2';
            //Backend CSS
            $app['styles']->add('slideshow_ex_edit', 'plugins/widgets/slideshow_ex/css/slideshowex.edit.css', ['widgetkit-application']);
            //Adding our own translations:
            $app['translator']->addResource('plugins/widgets/slideshow_ex/languages/'.$app['locale'].'.json');
            //Edit template:
            $app['angular']->addTemplate('slideshow_ex.edit', 'plugins/widgets/slideshow_ex/views/edit.php', true);
            //Adding tooltip:
            $app['scripts']->add($uikit.'-tooltip', 'vendor/assets/uikit/js/components/tooltip.min.js', [$uikit]);
            $app['styles']->add($uikit.'-tooltip', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/'.$plugin->getUIkitVersion().'/css/components/tooltip.min.css', [$uikit]);
            //jQuery wait plugin:
            $app['scripts']->add('jquery.wait', 'plugins/widgets/slideshow_ex/assets/jquery.wait.min.js', [$uikit]);
            //Marked:
            $app['scripts']->add('marked', 'plugins/widgets/slideshow_ex/assets/marked.min.js', [$uikit]);
            //Mailchimp for subscription:
            $app['scripts']->add('mailchimp', 'plugins/widgets/slideshow_ex/assets/jquery.formchimp.min.js', [$uikit]);
            //Underscore.js
            $app['scripts']->add('underscore', 'plugins/widgets/slideshow_ex/assets/underscore-min.js', [$uikit]);
            //Semantic version compare
            $app['scripts']->add('versioncompare', 'plugins/widgets/slideshow_ex/assets/versioncompare.min.js', [$uikit]);
            //Marked:
            $app['scripts']->add('replacer', 'plugins/widgets/slideshow_ex/assets/replacer.min.js', [$uikit]);
            //Generating dynamic update script:
            $app['scripts']->add('slideshow_ex.dynamic-updater', $plugin->generateUpdaterJS($app), [], 'string');
        },

        'request' => function ($event, $app) {
            $global = null;
            if ((isset($app['request'])) && (isset($app['request']->request))) {
                $content = $app['request']->request->get('content');
                if (isset($content['data']['_widget']['data']['global'])) {
                    $global = $content['data']['_widget']['data']['global'];
                }
            }

            if ($global) {
                //Global is set for valid requests like "Save" and "Save & Close"
                $plugin = new WidgetkitExPlugin($app);
                $plugin->saveGlobalSettings($global);
            }
        },

    ],

];
