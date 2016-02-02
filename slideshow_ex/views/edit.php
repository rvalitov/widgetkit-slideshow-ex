<?php
/*
Custom Slideshow widget for Widgetkit 2.
Author: Ramil Valitov
Contacts: ramilvalitov@gmail.com
Web: http://www.valitov.me/
Git: https://github.com/rvalitov/widgetkit-slideshow-ex
*/
?>

<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">

        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">Slideshow</a></li>
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
                    <span class="uk-form-label" for="wk-nav">{{'Navigation' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Select the navigation for your Slideshow."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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
                            <span><input class="uk-form-width-mini" type="text" ng-model="widget.data['thumbnail_width']"> {{'Width (px)' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Width of the thumbnails in pixels."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav == 'thumbnails'">
                            <span><input class="uk-form-width-mini" type="text" ng-model="widget.data['thumbnail_height']"> {{'Height (px)' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Height of the thumbnails in pixels."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.nav == 'thumbnails'">
                            <span><input type="checkbox" ng-model="widget.data['thumbnail_alt']"> {{'Use second image as thumbnail.' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="If checked then the second image will be used as a thumbnail. The second image is defined in the <strong>Content</strong> interface, you should use <strong>Custom</strong> as a content source to access this feature."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-slidenav">{{'Slidenav' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Enables/disables the slide navigation control (left and right arrows)."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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

                <h3 class="wk-form-heading">{{'Animations' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-animation">{{'Animation' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Select the animation that is used for displaying the Slideshow items."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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
                            <span><input class="uk-form-width-mini" type="text" ng-model="widget.data['slices']"> {{'Slices' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Number of slices used in the animation."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-duration">{{'Duration (ms)' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Duration of the animation."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-duration" class="uk-form-width-medium" type="text" ng-model="widget.data['duration']">
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Autoplay' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="The autoplay feature automatically switches the slideshow items."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['autoplay']"> {{'Enable autoplay' | trans}}</label>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['interval']"> Interval (ms)</label>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.autoplay">
                            <label><input type="checkbox" ng-model="widget.data['autoplay_pause']"> {{'Pause autoplay when hovering the slideshow' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">Kenburns<span  data-uk-tooltip style="margin-top: 5px;" title="The Ken Burns effect is a type of panning and zooming effect that generates a video animation to still photographs by slowly zooming in on subjects of interest and panning from one subject to another inside the photo."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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
                    <span class="uk-form-label">{{'Fullscreen' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Extend the Slideshow to full viewport height."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['fullscreen']"> {{'Extend to full viewport height' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-min-height">{{'Min. Height (px)' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Defines the minimal height of the Slideshow."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-min-height" class="uk-form-width-medium" type="text" ng-model="widget.data['min_height']">
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Media' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Display the image."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['media']"> {{'Show media' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Image' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Set the width and height of the image in pixels. Use 'auto' for auto size."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <label><input class="uk-form-width-small" type="text" ng-model="widget.data['image_width']"> {{'Width (px)' | trans}}</label>
                        <p class="uk-form-controls-condensed">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['image_height']"> {{'Height (px)' | trans}}</label>
                        </p>
                    </div>
                </div>

				<div class="uk-form-row" ng-if="widget.data.media">
                    <span class="uk-form-label">{{'Link' | trans}}<span  data-uk-tooltip title="Makes the whole image clickable. If you use an overlay, probably you will want to activate 'Add link to overlay' option (see below) to make the whole area of the slide clickable."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['image_link']"> {{'Add link to image' | trans}}</label>
                    </div>
                </div>
				
                <h3 class="wk-form-heading">{{'Overlay' | trans}}</h3>

                <div class="uk-form-row">
                <span class="uk-form-label" for="wk-overlay">{{'Overlay' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Define what will be displayed inside the overlay or hide the overlay."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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
                            </select> {{'Animation' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="The animation that will be applied to the overlay when being displayed on hover."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span>
                        </p>
                        <p class="uk-form-controls-condensed" ng-if="widget.data.overlay != 'none'">
                            <span><input type="checkbox" ng-model="widget.data['overlay_background']"> {{'Show panel background' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="A background (usually dark) is added to the overlay."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                        </p>
						<p class="uk-form-controls-condensed" ng-if="widget.data.overlay != 'none'">
                            <span><input type="checkbox" ng-model="widget.data['overlay_link']"> {{'Add link to overlay' | trans}}<span  data-uk-tooltip title="Makes the whole overlay clickable. Probably you will want to activate this feature both with 'Add link to image' option (see above) to make the whole area of the slide clickable. <strong>Notice:</strong> this feature strips all links ('a' tags) from your overlay, otherwise it can't work properly."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                        </p>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Text' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Show or hide title and content."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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
                    <span class="uk-form-label" for="wk-title-size">{{'Title Size' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Define the font size of the title."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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
                    <span class="uk-form-label" for="wk-content-size">{{'Content Size' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Define the font size of the content."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Display the Read More link. The link URL is added to each item in the Content Manager."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <span><input type="checkbox" ng-model="widget.data['link']"> {{'Show link' | trans}}</span>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-link-style">{{'Style' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Set the style of the Read More link."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-link-text">{{'Text' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Define the link text."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-link-text" class="uk-form-width-medium" type="text" ng-model="widget.data['link_text']">
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Badge' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Show or hide the badge which is displayed over the content."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['badge']"> {{'Show badge' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-badge-style">{{'Style' | trans}}<span  data-uk-tooltip style="margin-top: 5px;" title="Defines the style of the badge."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
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
                    <span class="uk-form-label">{{'Link Target' | trans}}<span data-uk-tooltip title="Enables/disables opening all links in a new window of the browser. Otherwise, they open in the same window."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link_target']"> {{'Open all links in a new window' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <span class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}<span data-uk-tooltip title="Adds a custom CSS class to the widget. You can specify several classes using space between them."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span></span>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>

            </li>
			<li>

                <h3 class="wk-form-heading">{{'About' | trans}}</h3>

				<div class="uk-grid">
					<div class="uk-text-center uk-width-medium-1-3" id="logo-widgetkit-slideshow-ex">
					</div>
					<div class="uk-width-medium-2-3">
						<table class="uk-table uk-table-striped">
							<tr>
								<td>
									Widget Name
								</td>
								<td id="name-widgetkit-slideshow-ex">
									N/A
								</td>
							</tr>
							<tr>
								<td>
									Version
								</td>
								<td id="version-widgetkit-slideshow-ex">
									N/A
								</td>
							</tr>
							<tr>
								<td>
									Build Date
								</td>
								<td id="build-widgetkit-slideshow-ex">
									N/A
								</td>
							</tr>
							<tr>
								<td>
									Author<span data-uk-tooltip title="See the complete information about contributors and acknowledgement on the website below."><i class="uk-icon uk-icon-question-circle uk-margin-small-left" style="color:#ffb105"></i></span>
								</td>
								<td>
									<a href="https://valitov.me" target="_blank">Ramil Valitov<i class="uk-icon uk-icon-external-link uk-margin-small-left"></i></a>
								</td>
							</tr>
							<tr>
								<td>
									Website
								</td>
								<td id="website-widgetkit-slideshow-ex">
									N/A
								</td>
							</tr>
							<tr>
								<td>
									Wiki and Manuals
								</td>
								<td id="wiki-widgetkit-slideshow-ex">
									N/A
								</td>
							</tr>
						</table>
						<div id="update-widgetkit-slideshow-ex" class="uk-text-center">
						</div>
					</div>
				<div>

            </li>
        </ul>

    </div>
</div>