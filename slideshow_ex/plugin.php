<?php
/*
SlideshowEx plugin for Widgetkit 2.
Author: Ramil Valitov
E-mail: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slideshow-ex
*/

require_once(__DIR__.'/views/WidgetkitExPlugin.php');
use WidgetkitEx\SlideshowEx\WidgetkitExPlugin;

return array(

    'name' => 'widget/slideshow_ex',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',
	
	'plugin_version' => 'v1.3.0',
	
	'plugin_date' => '26/12/2016',
	
	'plugin_logo' => 'https://raw.githubusercontent.com/wiki/rvalitov/widgetkit-slideshow-ex/images/logo.jpg',
	
	'plugin_wiki' => 'https://github.com/rvalitov/widgetkit-slideshow-ex/wiki',

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
			
			'slide_link'		=> false,
			'lightbox'			=> '',

            'link_target'        => false,
            'class'              => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {
			$plugin=new WidgetkitExPlugin($app);
			$uikit=($plugin->getCSSPrefix($app)=='uk') ? 'uikit' : 'uikit2';
            $app['scripts']->add('uikit-slideshow', 'vendor/assets/uikit/js/components/slideshow.min.js', array($uikit));
            $app['scripts']->add('uikit-slideshow-fx', 'vendor/assets/uikit/js/components/slideshow-fx.min.js', array($uikit));
			//Adding private CSS:
			$app['styles']->add('ram-slideshow-ex', 'plugins/widgets/slideshow_ex/css/slideshow-ex.css', array('widgetkit-application'));
        },

        'init.admin' => function($event, $app) {
			$plugin=new WidgetkitExPlugin($app);
			$uikit=($plugin->getCSSPrefix($app)=='uk') ? 'uikit' : 'uikit2';
			//Adding our own translations:
			$app['translator']->addResource('plugins/widgets/slideshow_ex/languages/'.$app['locale'].'.json');
			//Edit template:
            $app['angular']->addTemplate('slideshow_ex.edit', 'plugins/widgets/slideshow_ex/views/edit.php', true);
			//Adding tooltip:
			$app['scripts']->add($uikit.'-tooltip', 'vendor/assets/uikit/js/components/tooltip.min.js', array($uikit));
			$app['styles']->add($uikit.'-tooltip', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/'.$plugin->getUIkitVersion().'/css/components/tooltip.min.css', array($uikit));
			//jQuery wait plugin:
			$app['scripts']->add('jquery.wait', 'plugins/widgets/slideshow_ex/assets/jquery.wait.min.js', array($uikit));
			//Marked:
			$app['scripts']->add('marked', 'plugins/widgets/slideshow_ex/assets/marked.min.js', array($uikit));
			//Mailchimp for subscription:
			$app['scripts']->add('mailchimp', 'plugins/widgets/slideshow_ex/assets/jquery.formchimp.min.js', array($uikit));
			//jQuery form validator http://www.formvalidator.net/:
			$app['scripts']->add('jquery-form-validator', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js', array($uikit));
			//Underscore.js
			$app['scripts']->add('underscore', 'plugins/widgets/slideshow_ex/assets/underscore-min.js', array($uikit));
			//Semantic version compare
			$app['scripts']->add('versioncompare', 'plugins/widgets/slideshow_ex/assets/versioncompare.min.js', array($uikit));
			//Marked:
			$app['scripts']->add('replacer', 'plugins/widgets/slideshow_ex/assets/replacer.min.js', array($uikit));
			//Generating dynamic update script:
			$app['scripts']->add('slideshow_ex.dynamic-updater', $plugin->generateUpdaterJS($app), array(), 'string');
        },
		
		'request' => function($event, $app) {
			$global=null;
			if ( (isset($app['request'])) && (isset($app['request']->request)) ) {
				$content=$app['request']->request->get('content');
				if (isset($content['data']['_widget']['data']['global']))
					$global=$content['data']['_widget']['data']['global'];
			}
				
			if ($global){
				//Global is set for valid requests like "Save" and "Save & Close"
				$plugin=new WidgetkitExPlugin($app);
				$plugin->saveGlobalSettings($global);
			}
		}

    )

);
