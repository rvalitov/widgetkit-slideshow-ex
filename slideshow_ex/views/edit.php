<?php
/*
Custom Slideshow widget for Widgetkit 2.
Author: Ramil Valitov
Contacts: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slideshow-ex
*/

use WidgetkitEx\SlideshowEx\WidgetkitExPlugin;
$plugin=new WidgetkitExPlugin($app);
?>
<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal uk-slideshowex" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">

        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">{{'Slideshow' | trans}}</a></li>
                <li><a href="">{{'Media' | trans}}</a></li>
                <li><a href="">{{'Content' | trans}}</a></li>
                <li><a href="">{{'General' | trans}}</a></li>
				<li><a href="">{{'About' | trans}}</a></li>
            </ul>
        </div>

    </div>
    <div class="uk-width-medium-3-4">

        <ul id="nav-content" class="uk-switcher">
            <li>

                <h3 class="wk-form-heading">{{'Navigation' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-nav">{{'Navigation' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Select the navigation for the widget.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-nav" class="uk-form-width-medium" ng-model="widget.data['nav']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="dotnav">{{'Dotnav' | trans}}</option>
                            <option value="thumbnails">{{'Thumbnails' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav != 'none'">
                            <label><input type="checkbox" ng-model="widget.data['nav_overlay']"> {{'Position the nav as overlay.' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav != 'none'">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['nav_align']">
                                    <option value="left">{{'Left' | trans}}</option>
                                    <option value="center">{{'Center' | trans}}</option>
                                    <option value="right">{{'Right' | trans}}</option>
                                    <option value="justify">{{'Justify' | trans}} ({{'Only Thumbnails' | trans}})</option>
                                </select>
                                {{'Alignment' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav == 'thumbnails'">
                            <span><input class="uk-form-width-mini" type="text" ng-model="widget.data['thumbnail_width']"> {{'Width (px)' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Width of the thumbnails in pixels.' | trans}}"><i></i></span></span>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav == 'thumbnails'">
                            <span><input class="uk-form-width-mini" type="text" ng-model="widget.data['thumbnail_height']"> {{'Height (px)' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Height of the thumbnails in pixels.' | trans}}"><i></i></span></span>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav == 'thumbnails'">
                            <span><input type="checkbox" ng-model="widget.data['thumbnail_alt']"> {{'Use second image as thumbnail.' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'If checked then the second image will be used as a thumbnail. The second image is defined in the <strong>Content</strong> interface, you should use <strong>Custom</strong> as a content source to access this feature.' | trans}}"><i></i></span></span>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-slidenav">{{'Slidenav' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Enables/disables the slide navigation control (left and right arrows).' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-slidenav" class="uk-form-width-medium" ng-model="widget.data['slidenav']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="default">{{'Default' | trans}}</option>
                            <option value="top-left">{{'Top/Left' | trans}}</option>
                            <option value="top-right">{{'Top/Right' | trans}}</option>
                            <option value="bottom-left">{{'Bottom/Left' | trans}}</option>
                            <option value="bottom-right">{{'Bottom/Right' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Color' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['nav_contrast']"> {{'Use a high-contrast color if overlay.' | trans}}</label>
                    </div>
                </div>

				<div class="uk-form-row">
                    <span class="uk-form-label">{{'Clickable Slide' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'If checked, then the whole slide becomes clickable.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['slide_link']"> {{'Make the whole slide clickable.' | trans}}</label>
                    </div>
                </div>
				
                <h3 class="wk-form-heading">{{'Animations' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-animation">{{'Animation' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Select the animation that is used for displaying the widget items.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-animation" class="uk-form-width-medium" ng-model="widget.data['animation']">
                            <option value="fade">{{'Fade' | trans}}</option>
                            <option value="scroll">{{'Scroll' | trans}}</option>
                            <option value="swipe">{{'Swipe' | trans}}</option>
                            <option value="scale">{{'Scale' | trans}}</option>
                            <option value="slice-up">{{'Slice Up' | trans}}</option>
                            <option value="slice-down">{{'Slice Down' | trans}}</option>
                            <option value="slice-up-down">{{'Slice Up Down' | trans}}</option>
                            <option value="fold">{{'Fold' | trans}}</option>
                            <option value="puzzle">{{'Puzzle' | trans}}</option>
                            <option value="boxes">{{'Boxes' | trans}}</option>
                            <option value="boxes-reverse">{{'Boxes Reverse' | trans}}</option>
                            <option value="random-fx">{{'Random Fx' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="(['slice-up', 'slice-down', 'slice-up-down', 'fold', 'puzzle', 'boxes', 'boxes-reverse', 'random-fx'].indexOf(widget.data.animation) > -1)">
                            <span><input class="uk-form-width-mini" type="text" ng-model="widget.data['slices']"> {{'Slices' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Number of slices used in the animation.' | trans}}"><i></i></span></span>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-duration">{{'Duration (ms)' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Duration of the animation.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-duration" class="uk-form-width-medium" type="text" ng-model="widget.data['duration']">
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Autoplay' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'The autoplay feature automatically switches the widget items.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['autoplay']"> {{'Enable autoplay' | trans}}</label>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['interval']"> Interval (ms)</label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input type="checkbox" ng-model="widget.data['autoplay_pause']"> {{'Pause autoplay when hovering the widget' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">Kenburns<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'The Ken Burns effect is a type of panning and zooming effect that generates a video animation to still photographs by slowly zooming in on subjects of interest and panning from one subject to another inside the photo.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['kenburns']"> {{'Enable Kenburns effect on the image' | trans}}</label>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.kenburns">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['kenburns_animation']">
                                    <option value="">{{'Default' | trans}}</option>
                                    <option value="uk-animation-middle-center">{{'Center' | trans}}</option>
                                    <option value="uk-animation-bottom-center">{{'Top' | trans}}</option>
                                    <option value="uk-animation-top-center">{{'Bottom' | trans}}</option>
                                    <option value="uk-animation-middle-right">{{'Left' | trans}}</option>
                                    <option value="uk-animation-middle-left">{{'Right' | trans}}</option>
                                    <option value="uk-animation-bottom-right">{{'Top Left' | trans}}</option>
                                    <option value="uk-animation-bottom-left">{{'Top Right' | trans}}</option>
                                    <option value="uk-animation-top-right">{{'Bottom Left' | trans}}</option>
                                    <option value="uk-animation-top-left">{{'Bottom Right' | trans}}</option>
                                </select>
                                {{'Animation' | trans}}
                            </label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.kenburns">
                            <label><input class="uk-form-width-mini" type="text" ng-model="widget.data['kenburns_duration']"> {{'Duration in seconds' | trans}}</label>
                        </p>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Height' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Fullscreen' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Extend the widget to full viewport height.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['fullscreen']"> {{'Extend to full viewport height' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-min-height">{{'Min. Height (px)' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Defines the minimal height of the widget.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-min-height" class="uk-form-width-medium" type="text" ng-model="widget.data['min_height']">
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Media' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Display the image.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['media']"> {{'Show media' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Image' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Set the width and height of the image in pixels. Use \'auto\' for auto size.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <label><input class="uk-form-width-small" type="text" ng-model="widget.data['image_width']"> {{'Width (px)' | trans}}</label>
                        <p class="uk-form-controls-condensed">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['image_height']"> {{'Height (px)' | trans}}</label>
                        </p>
                    </div>
                </div>

				<div class="uk-form-row">
                    <span class="uk-form-label" for="wk-media-lightbox">{{'Lightbox Type' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Enables/disables the lightbox mode.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-media-lightbox" class="uk-form-width-medium" ng-model="widget.data['lightbox']">
                            <option value="">{{'None' | trans}}</option>
                            <option value="lightbox">{{'Lightbox' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="widget.data.lightbox === 'lightbox'">
                    <span class="uk-form-label" for="wk-media-lightbox-arrows">{{'Lightbox Arrows' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Visibility of left/right arrows.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-media-lightbox-arrows" class="uk-form-width-medium" ng-model="widget.data['lightbox_arrows']">
                            <option value="">{{'Visible on mouse hover' | trans}}</option>
                            <option value="always">{{'Always visible' | trans}}</option>
                            <option value="touch">{{'Visible for touch devices' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="widget.data.lightbox === 'lightbox'">
                    <span class="uk-form-label" for="wk-media-lightbox-arrows">{{'Lightbox Arrows' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Visibility of left/right arrows.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-media-lightbox-arrows" class="uk-form-width-medium" ng-model="widget.data['lightbox_arrows']">
                            <option value="">{{'Visible on mouse hover' | trans}}</option>
                            <option value="always">{{'Always visible' | trans}}</option>
                            <option value="touch">{{'Visible for touch devices' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="widget.data.lightbox === 'lightbox'">
                    <span class="uk-form-label">{{'Clickable areas' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['lightbox_areas']"> {{'Make areas clickable instead of just arrows for next/previous buttons.' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="(widget.data.lightbox === 'lightbox') && (widget.data.lightbox_areas)">
                    <span class="uk-form-label" for="wk-media-lightbox_area_size">{{'Buttons area size' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Size of the area for next and previous buttons.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-media-lightbox_area_size" class="uk-form-width-medium" ng-model="widget.data['lightbox_area_size']">
                            <option value="10%">10%</option>
                            <option value="15%">15%</option>
                            <option value="20%">20%</option>
                            <option value="25%">25%</option>
                            <option value="30%">30%</option>
                            <option value="35%">35%</option>
                            <option value="40%">40%</option>
                            <option value="45%">45%</option>
                            <option value="50%">50%</option>
                        </select>
                    </div>
                </div>
				
                <h3 class="wk-form-heading">{{'Overlay' | trans}}</h3>

                <div class="uk-form-row">
                <span class="uk-form-label" for="wk-overlay">{{'Overlay' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Define what will be displayed inside the overlay or hide the overlay.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-overlay" class="uk-form-width-medium" ng-model="widget.data['overlay']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="center">{{'Center' | trans}}</option>
                            <option value="middle-left">{{'Center Left' | trans}}</option>
                            <option value="top">{{'Top' | trans}}</option>
                            <option value="bottom">{{'Bottom' | trans}}</option>
                            <option value="left">{{'Left' | trans}}</option>
                            <option value="right">{{'Right' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.overlay != 'none'">
                            <select class="uk-form-width-small" ng-model="widget.data['overlay_animation']">
                                <option value="fade">{{'Fade' | trans}}</option>
                                <option value="slide">{{'Slide' | trans}}</option>
                            </select> {{'Animation' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'The animation that will be applied to the overlay when being displayed on hover.' | trans}}"><i></i></span>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.overlay != 'none'">
                            <span><input type="checkbox" ng-model="widget.data['overlay_background']"> {{'Show panel background' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'A background (usually dark) is added to the overlay.' | trans}}"><i></i></span></span>
                        </p>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Text' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Show or hide title and content.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['title']"> {{'Show title' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['content']"> {{'Show content' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-title-size">{{'Title Size' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Define the font size of the title.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-title-size" class="uk-form-width-medium" ng-model="widget.data['title_size']">
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="large">{{'Extra Large' | trans}}</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-content-size">{{'Content Size' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Define the font size of the content.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-content-size" class="uk-form-width-medium" ng-model="widget.data['content_size']">
                            <option value="">{{'Default' | trans}}</option>
                            <option value="large">{{'Text Large' | trans}}</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Link' | trans}}</h3>

				<div class="uk-panel uk-panel-box uk-alert uk-alert-warning" ng-if="widget.data['lightbox'] != ''">
					<p class="uk-text-center"><i class="uk-icon uk-icon-warning uk-margin-small-right"></i>The settings in this "Link" section are ignored, because you have activated the "Lightbox" mode in the "Media" tab.</p>
				</div>
				
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Display the Read More link. The link URL is added to each item in the Content Manager.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <span><input type="checkbox" ng-model="widget.data['link']"> {{'Show link' | trans}}</span>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-link-style">{{'Style' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Set the style of the Read More link.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-link-style" class="uk-form-width-medium" ng-model="widget.data['link_style']">
                            <option value="text">{{'Text' | trans}}</option>
                            <option value="button">{{'Button' | trans}}</option>
                            <option value="primary">{{'Button Primary' | trans}}</option>
                            <option value="button-large">{{'Button Large' | trans}}</option>
                            <option value="primary-large">{{'Button Large Primary' | trans}}</option>
                            <option value="button-link">{{'Button Link' | trans}}</option>
                        </select>
                    </div>
                </div>

				<div class="uk-panel uk-panel-box uk-alert uk-alert-warning" ng-if="widget.data['slide_link'] && widget.data['lightbox'] == ''">
					<p class="uk-text-center"><i class="uk-icon uk-icon-warning uk-margin-small-right"></i>{{'The \'Text\' option below is ignored, because you have made the whole slide clickable in the \'Slideshow\' tab.'|trans}}</p>
				</div>
				
                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-link-text">{{'Text' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Define the link text.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-link-text" class="uk-form-width-medium" type="text" ng-model="widget.data['link_text']">
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Badge' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Show or hide the badge which is displayed over the content.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['badge']"> {{'Show badge' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-badge-style">{{'Style' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Defines the style of the badge.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <select id="wk-badge-style" class="uk-form-width-medium" ng-model="widget.data['badge_style']">
                            <option value="badge">{{'Default' | trans}}</option>
                            <option value="success">{{'Success' | trans}}</option>
                            <option value="warning">{{'Warning' | trans}}</option>
                            <option value="danger">{{'Danger' | trans}}</option>
                            <option value="text-muted">{{'Text Muted' | trans}}</option>
                            <option value="text-primary">{{'Text Primary' | trans}}</option>
                        </select>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'General' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Link Target' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Enables/disables opening all links in a new window of the browser. Otherwise, they open in the same window.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link_target']"> {{'Open all links in a new window' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}<span data-uk-tooltip="'cls':'uk-slideshowex-tooltip'" title="{{ 'Adds a custom CSS class to the widget. You can specify several classes using space between them.' | trans}}"><i></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>

            </li>
			<li>

                <h3 class="wk-form-heading">{{'About' | trans}}</h3>

				<?php $plugin->printAboutInfo($app);?>

				<h3 class="wk-form-heading">{{'Newsletter' | trans}}</h3>
	
				<?php $plugin->printNewsletterInfo($app);?>
				
				<h3 class="wk-form-heading">{{'Donation' | trans}}</h3>
				<?php $plugin->printDonationInfo($app);?>

            </li>
        </ul>

    </div>
</div>