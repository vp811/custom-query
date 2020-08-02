# Custom Query Plugin
## Description
This plugin will create custom query using the shortcode [ev-custom-query]

## Version
v1.0.0

## Layouts
### Blocks
You can show the block styling of the posts by coding the shortcode `[ev-custom-query design="blocks"]`


### List
You can show the block styling of the posts by coding the shortcode `[ev-custom-query design="list"]`

## User Options
### Category
Allows user to select the category they want to query. Must use the slug of the category.

Example:
`[ev-custom-query category="featured-news"]`

### Total Posts
Allows user to select the amount of posts they would like display. If user does not select number, the default will be 10.

Example:
`[ev-custom-query totalposts="3"]`

### Order
Allows user to order the results in ascending or descending order.

Example:
`[ev-custom-query order="ASC"]`

### Orderby
Allows the user to select how they would like to order the posts (title, rand, date, etc.)

Example:
`[ev-custom-query orderby="rand"]`

### Image
Allows the user to select if they would like to display the featured image.

Example:
`[ev-custom-query image="yes"]`

### Excerpt
Allows the user to select if they would like to display the excerpt.

Example:
`[ev-custom-query excerpt="yes"]`

## Plugins Required
No external plugins required
