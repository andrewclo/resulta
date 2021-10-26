# NFL Team Plugin

This plugin will load NFL teams from the Resula API and display the feed as a table on a Wordpress page of your choice.

## Installation

- Download the plugin from [link](https://www.dropbox.com/s/5aer200at4ac7s7/resulta-teams.zip?dl=0 "Dropbox").
- Upload the plugin ZIP through the Wordpress plugin admin. Dashboard > Plugins > Add New.
- Activate the plugin.
- Add this shortcode [resulta-teams] to any Wordpress page where you wish to display the plugin data table.

## Overview

This plugin uses [link](https://alpinejs.dev "AlpineJS") to dynamically sort the table data by the values in each column. The user can sort each column by clicking on the header. By default the data is sorted in ascending order for each column. A second click will sort the data in descending order.

The shortcode can be added to a WYSIWYG block or the Classic page editor.

## Additional Features

Should we wish to continue development of this plugin the following additional features would be on the roadmap:

- Active class for the selected column.
- UI to display the ascending or decending column order.
- Responsive display for mobile.
- Add logic for error detection for the JSON data.
- Add caching for JSON data so the API does not have to be called on every page load.
