# postcode-ward-finder
A Wordpress plugin that adds a search box to let readers find which electoral ward their postcode is in.

## Installation
To install, download postcode-ward-finder.v1.0.zip, then in your Wordpress admin dashboard, go to "Plugins" -> "Add new" -> "Upload Plugin" -> "Activate Plugin".

## Adding to a page
To add the postcode search box to a page, just add the following shortcode when in edit mode:

[postcode-search district="SW1" ward1="Ward 1 Name" ward2="Ward 2 Name" ward3="Ward 3 Name" postcodes1="1AA, 1AB, 1AC" postcodes2="2AA, 2AB, 2AC", postcodes3="3AA, 3AB, 3AC"]

Update "district=" with the first part of your area's postcode, "ward1=" to "ward3=" with the names of the wards, and "postcodes1=" to "postcodes3=" with comma separated lists of the postcodes in each ward area.

## Usage
Should be straightforward for any reader: just type the second part of your postcode into the text box, click the "Check Postcode" button, and it will say which ward that postcode belongs to.
