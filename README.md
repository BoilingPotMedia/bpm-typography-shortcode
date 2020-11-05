# bpm-typography-shortcode

BPM Typography Shortcode Plugin

WordPress provides a visual editor and a HTML editor. Oftentimes, when custom styles are added to HTML by developers in the HTML editor, the styles are obliterated when other users later edit content using the visual editor because the visual editor hides the custom styles from view. 

BPM uses the typography shortcode to ensure that custom styles remain intact. The typography shortcode appears the same on both the HMTL and visual editor. 

Includes one shortcode:

* [t]Content[/t]

T (typography) accepts two parameters: 

S (style)
ELM (element)

If you use the following line in the WordPress Editor:

    Regular [t s="bold"]bold[/t] regular.

The result on the published page will be:
Regular **bold** regular.

The result as HTML will be:

    Regular <span class="type bold">bold</span> regular.

Any ammount of text can be wrapped in a Typography shortcode - one letter, or one page. Any alphabet charachter can be passed into the style parameter. In addition, dashes may be used. 

The words or classes that are passed into the style parameter will only have an impact on the style of the text if they are valid CSS classes, defined in the website stylesheet. 
