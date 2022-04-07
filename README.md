# Overview
This template is built using the Mailchimp template syntax and the Twig template engine to assemble the HTML files.

- [MailChimp Template Language](https://templates.mailchimp.com/getting-started/template-language/)
- [MailChimp Merge Tags](https://mailchimp.com/help/all-the-merge-tags-cheat-sheet/)
- [Twig Template Language](https://twig.symfony.com/)

Email Templates (Require Login).

- [ECU - Email Template 1](https://us20.admin.mailchimp.com/templates/edit?id=10000159)
- [ECU - Email Template 2](https://us20.admin.mailchimp.com/templates/edit?id=10000167)
- [ECU - Email Template 3](https://us20.admin.mailchimp.com/templates/edit?id=10000171)

If you're only editing the template, you won't need to reference any of the template languages, only the MailChimp template merge tags.

# Development

This development template system uses the [Twig](https://twig.symfony.com/) template engine. To use this repository, follow these steps:

1. Install this repository with `git clone`
2. Run `composer install`
2. Create and edit your templates in the `templates` directory
3. Run `php index.php` in your template directory to generate your HTML templates.

You should now see your rendered templates in the `dist` folder. Copy and paste these templates into Mailchimp for usage.

## Planned Features

- Webpack + Browsersync
- Autoprefixing w/ Comments Enabled

# General Tips
For general use, the content editor should work for everything. However with all WYSIWYG (what-you-see-is-what-you-get) editors, inconsistencies arise when using features like backspaces and style tags (mostly due to the fact that users enter content differently).

To achieve the most consistent styling, we recommend to use the HTML view (by clicking the `<>` button) when using the Mailchimp editor. It may seem more difficult at first, but it allows for more precise control and functionality across browsers.

All sample code and instructions in this README will assume usage of the HTML view as well.


# Editing
Hovering over elements in __Edit Design__ mode will allow you to see how sections and components are defined. Most of the editable elements are hideable by default (represented by an eye icon). Note that you won't be actually be able to hide these areas until you create a campaign that uses the template.

Most longform content can be edited in one section, but some sections are separated for ease of use. Most formats are also reproducible by copying and pasting the predefined content.

However, a few sections require more complex HTML, and might require a bit more instruction to adjust. Below are instructions for all the predefined sections.

# Template Structure

## Email Template 1
- [Header](#header)
- [Heading](#heading)
- [Subheading](#subheading)
- [Copy Section](#copy-section) (1)
- [Copy Section](#copy-section) (2)
- [Copy Section](#copy-section) (3)
- [Call to Action](#call-to-action)
	- [Call to Action Text](#call-to-action-text)
	- [Call to Action Image](#call-to-action-image)
- [Copy Section](#copy-section) (4)

## Email Template 2
- [Header](#header)
- [Heading](#heading)
- [Subheading](#subheading)
- [Copy Section](#copy-section) (1)
- [Copy Section w/ Image](#copy-section-w-image) (Repeatable)
- [Copy Section](#copy-section) (2)

## Email Template 3
- [Header](#header)
- [Copy Section](#copy-section) (1)
- [Card Section](#card-section)
- [Copy Section](#copy-section) (2)
- [Copy Section](#copy-section) (3)
- [Copy Section](#copy-section) (4)
- [Copy Section](#copy-section) (5)


# Sections

## Header
Simple field for editing the top title of the e-mail. Note that editing this field does not change the subject of the email.

## Heading
First heading that appears in the main section of the email. Hideable.

## Subheading
Second heading that appears in the main section of the email. This subheading is special since it doesn't add a margin between itself and the heading above. Hideable.

## Copy Section
First instance of more complex WYSIWYG editor. All the following tags have been styled and various rules.

### Blockquote - `<blockquote>`
Provides a grey container for content with padding. You can place any of the other tags within this container.

### Heading - `<h2>`, `<h3>`, `<h4>`
We don't recommend using `<h1>` tags since they are typically reserved for the first heading of the page (in the e-mail template this is in the header).

### Horizontal Rule - `<hr>`
Used to add a divider within Copy Sections. Most copy sections have a `<hr>` added by default, however, you can create new visual sections by adding a new horizontal rule and then succeeding content.

### Image - `<img>`
Insert an image into the content. Images must be uploaded first using Mailchimp's [Content Studio](https://mailchimp.com/help/use-the-content-studio/) before they can be added to the template. We always recommend using an `alt` tag for accessibility purposes.

### Link - `<a>`
Must be used within an `<p>` tag if highlighting/underlining text, otherwise can be used standalone if the `class="button"` attribute is used.
#### Attribute `class="button"`
Usage would look like `<a class="subheading">Your Text Here</a>` Used to create a button-styled link.
#### Attribute `class="arrow"`
Usage would look like `<a class="arrow">Your Text Here</a>` Used to create a link with an arrow.

### List (Ordered) - `<ol>`
Numbered list. Direct children must be `<li>` tags. However, the children `<li>` tags can include `<p>`, `<br>`, and `<span>` tags to achieve various styles. See [here](#list-special-usage) for an example of special usage.

### List (Unordered) - `<ol>`
Non-numbered list. Direct children must be `<li>` tags. However, the children `<li>` tags can include `<p>`, `<br>`, and `<span>` tags to achieve various styles. See [here](#list-special-usage) for an example of special usage.

#### List Special Usage
There are cases of of special list formatting used in Email Template 2 - Copy Sections 4 and 5. Here is an example: 

	<ul>
		<li>
			<p><a href="https://ecuad.ca">Info Session: Summer Institute for Teens & Junior Art Intensive 2022</a><br>Feb. 1</p>
			<p>Join us for our next Information Session and learn about our JAI and SIT 2022 programming for teens. Parents, teachers and future students welcome!</p>
		</li>
		<li>
			<p><a href="https://ecuad.ca">Twilight Hour Talk: Tania Willard</a><br>Jan. 27</p>
			<p>Join us for our next Information Session and learn about our JAI and SIT 2022 programming for teens. Parents, teachers and future students welcome!</p>
		</li>
		<li>
			<p><a href="https://ecuad.ca">Sarah Davidson: Swamp Sight | WAAP</a><br>Thru Feb. 19</p>
			<p>Join us for our next Information Session and learn about our JAI and SIT 2022 programming for teens. Parents, teachers and future students welcome!</p>
		</li>
	</ul>

### Paragraph - `<p>`
All text must be wrapped in a `<p>` tag. This formats the text and applies margins to your text. You can use `<br>` tags within these tags, but that will result in a line break, not a full paragraph break.
#### Attribute `class="subheading"`
Usage would look like `<p class="subheading">Your Text Here</p>`. Used for areas where a heading requires a subheading without a top margin. You can see an example of this usage in __Email Template 3 - Copy Section 2__.


### Span - `<span>`
Two specially styled `<span>` tags have been included in the templates:

	<span class="indicator indicatorNew">Your Text Here</span> 

Adds grey-highlighted text to your copy.

	<span class="indicator indicatorFeatured">Your Text Here</span>

Adds white-highlighted text to your copy. Should only be used within the [Call To Action](#call-to-action) section.

## Copy Section w/ Image
A specially formatted copy section with special rules:

- The first HTML tag must be an `<hr>` tag.
- The second HTML tag must be a `<div>` tag. All copy should go into this section.
- The third and final HTML tag must be a `<img>` tag. It is recommended to use an image with 140x157 pixels. If needed, reference the pre-defined template to see how these images should be visually styled/contained.

This section is also repeatable for ease-of-use.

## Call to Action
Call to Action composed of two smaller components for text and images. Hideable.

### Call to Action Text
Operates the way as a [Copy Section](#copy-section). Unfortunately due to its inherited styles it iss difficult to edit this copy from the default editor. Recommended to edit through the HTML view.

### Call to Action Image
Container with only a single `<img>` tag. Only one image tag should ever go in this editor.

It's recommended to use an image with width equal or greater than the height (with a center-center focal point). The sides will be cropped out to fit the container.

## Card Section
Contains two editable cards with special rules:

- The first HTML tag must be an `<img>` tag.
- The second HTML tag must be a `<div>` tag. All copy should go into this section.

# Style
You can edit few styles on the __Edit Design__ view.

## Call to Action Colour
Allows you to change the Call to Action colour. 

Can be a hex value e.g. `#FFFFFF`, or an CSS-valid text value e.g. `red`

## Header Colour
Allows you to change the Header colour.

Can be a hex value e.g. `#FFFFFF`, or an CSS-valid text value e.g. `red`