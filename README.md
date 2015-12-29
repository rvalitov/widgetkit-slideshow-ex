![SlideshowEx widget logo](https://raw.githubusercontent.com/rvalitov/widgetkit-slideshow-ex/master/images/slideshowex-logo.png)
# Overview
**SlideshowEx** is an advanced Slideshow widget for [Yootheme Widgetkit2](https://yootheme.com/widgetkit). After installation it becomes available in the Widgets list as a "native" widget and can be used with any [Warp 7 theme](https://yootheme.com/themes).

## Features
Or why it's better than original Slideshow provided by Yootheme?
* **Clickable image** - a link can be attached to the slide's image (media).
* **Clickable overlay** - a link can be attached to whole overlay.
* **Clickable slide** - mixing two features 'Clickable image' and 'Clickable overlay' allows to make the whole slide clickable.
* **Backward compatibility** - all other behavior, styling and features of the original [Slideshow widget](http://yootheme.com/demo/widgetkit/joomla/index.php/home/slideshow) are preserved.

# Supported platforms
* The code is based on Widgetkit 2.5.2, however it should work with any Widgetkit 2.4.x and later.
* Joomla 3.4.x or later required
I didn't test it with Wordpress.

# Installation
## Installation Overview
We use "clean" and "neat" approach according to the official Yootheme's manual:
* [Custom widgetkit plugin](http://yootheme.com/widgetkit/documentation/customizing/custom-widget-plugin)
* [Where to store your customizations](https://yootheme.com/widgetkit/documentation/customizing/where-to-store-your-customizations)

Such approach allows you to:
* keep original Yootheme's Widgetkit source files
* preserve original Yootheme's functionality
* safely do updates to Yootheme's files (download new versions of Widgetkit 2), keeping our new widget (modifications won't be overwritten during update process)

## Installation Process
The installation is very simple. You just need to copy the folder _slideshow_ex_ to _/templates/THEME-NAME/widgetkit/widgets/_, so that you will have a folder _/templates/THEME-NAME/widgetkit/widgets/slideshow_ex_. The _THEME-NAME_ is a folder of your [Warp 7 theme](https://yootheme.com/themes), e.g. it can be _yoo_vida_, _yoo_finch_, etc. 

# Setup and usage
## Configure the widget
After successful installation you should see the SlideshowEx widget in the widgetkit control panel page, so that you can select it from the list:
![SlideshowEx widget](https://raw.githubusercontent.com/rvalitov/widgetkit-map-ex/master/images/widgets-list.jpeg)

You should configure the widget as usual, e.g. the [Yootheme documentation](http://yootheme.com/demo/widgetkit/joomla/index.php/home/slideshow) can be useful.

All the advanced features of the SlideshowEx are shown on the following screenshot:
![SlideshowEx widget settings screen](https://raw.githubusercontent.com/rvalitov/widgetkit-slideshow-ex/master/images/slideshowex-settings.jpeg)
If you don't activate any of these features, then the SlideshowEx behaves exactly as the original Slideshow widget from the Widgetkit bundle.

Options and description:
* **Add link to image** - if checked, then the whole image will be clickable. This option is available only if the 'Show media' option is checked. If you use an overlay, probably you will want to activate 'Add link to overlay' option (see below) to make the whole area of the slide clickable.
* **Add link to overlay** - if checked, then the widget makes the whole overlay clickable. This option is available only if the 'Overlay' option is set to anything other than 'None'. Probably you will want to activate this feature both with 'Add link to image' option (see above) to make the whole area of the slide clickable. **Warning!** This feature works only if you don't have links (<a> tags) inside your overlay. Such links can get there from the content you display in the overlay. There is a small possibility that you may even experience incorrect rendering issues if you activate this feature with links inside the overlay.

# Authors, Contributors and Acknowledgment
* This widget is created by [Ramil Valitov](http://www.valitov.me).
* The code is based on the original [Slideshow widget](http://yootheme.com/demo/widgetkit/joomla/index.php/home/slideshow) by [Yootheme](http://yootheme.com/).
* Logo is based on [Tango Icon Library](https://www.iconfinder.com/iconsets/tango-icon-library)

# Feedback
Your feedback is very appreciated. If you want to see new features in this module, please, post your ideas and feature requests in the [issue tracker](https://github.com/rvalitov/widgetkit-slideshow-ex/issues).

# Support or Contact
Having trouble with SlideshowEx Widget? May be something has already been described in the [Wiki area](https://github.com/rvalitov/widgetkit-slideshow-ex/wiki) or reported in the [issue tracker](https://github.com/rvalitov/widgetkit-slideshow-ex/issues). If you don't find your problem there, then, please, add your issue there. 

Being a free project which I do in my spare time, I hope you understand that I can't offer 24/7 support:) You may contact me via e-mail ramilvalitov@gmail.com, I will try to answer to all of them (if such messages imply an answer), however, not immediately, it may take a few days or a week... so, just be patient. 

Note, that I can answer only to questions and problems directly related to SlideshowEx widget. Answers to basic questions about the widgetkit nature and simple help about how to use widgets in general or how to use Joomla you can find in appropriate forums:
* [Joomla](http://forum.joomla.org/)
* [Widgetkits](https://yootheme.com/support)
