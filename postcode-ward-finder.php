<?php
/**
 * Plugin Name:  Postcode Ward Finder
 * Plugin URI:   https://github.com/mjgilson/postcode-ward-finder
 * Description:  This plugin adds a search box to let readers find which electoral ward their postcode is in. Add it to any page with the following shortcode: [postcode-search district="SW1" ward1="Ward 1 Name" ward2="Ward 2 Name" ward3="Ward 3 Name" postcodes1="1AA, 1AB, 1AC" postcodes2="2AA, 2AB, 2AC", postcodes3="3AA, 3AB, 3AC"].
 * Author:       Matt Gilson
 * Version:      1.0
 * Author URI:   https://github.com/mjgilson
 * License:      GPL v3 or later
 * License URI:  https://www.gnu.org/licenses/gpl-3.0.html
 */

// Add Shortcode
function postcode_search_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
                        'district' => '',
			'ward1' => '',
			'ward2' => '',
			'ward3' => '',
                        'postcodes1' => '',
                        'postcodes2' => '',
                        'postcodes3' => '',
		),
		$atts,
		'postcode-search'
	);

	// return custom html & js code
	return '<div class="postcodeSearchForm"><p><b>Postcode:</b></p>
  <p>' . $atts['district'] . ' <input type="text" name="postcode-text"></p>
  <button onclick="clickPostcodeButton()">Check Postcode</button>
  <p id="ward-para"></p></div>

  <script>
   function checkWard(checkedPostcode) {
    // initalise postcode data
    var wardName = ["' . $atts['ward1'] . '", "' . $atts['ward2'] . '", "' . $atts['ward3'] . '"]
    var wardPostcodes = ["' . $atts['postcodes1'] . '", "' . $atts['postcodes2'] . '", "' . $atts['postcodes3'] . '"]

    // search for postcode within each ward
    for (var i = 0; i < wardPostcodes.length; i++){
     if(wardPostcodes[i].search(checkedPostcode) > -1){return "Postcode ' . $atts['district'] . ' " + checkedPostcode + " is in " + wardName[i] ;}
    }

    // return false if no match is found
    return false;
   }

   function checkPostcode(postcodeText) {
    // check if its a valid postcode
    var postcodePattern = new RegExp("[0-9]{1,2}[a-zA-Z]{2}");
    if(!postcodePattern.test(postcodeText)){return "No postcode found in: " + postcodeText;}

    // if its valid then check which ward its in
    var validPostcode = postcodePattern.exec(postcodeText.toUpperCase());
    if (checkWard(validPostcode)){return checkWard(validPostcode);}

    // otherwise say that its not known
    return "Postcode ' . $atts['district'] . ' " + validPostcode + " is not a known postcode for this area"
   }

   function clickPostcodeButton() {
    // get input text
    var postcodeInputText = document.getElementsByName("postcode-text")[0].value;

    // check the input and get text to output
    var textOutput = checkPostcode(postcodeInputText);

    // display the output text
    document.getElementById("ward-para").innerHTML = textOutput;
   }

  </script>';

}


// set Wordpress hook for shortcode
add_shortcode( 'postcode-search', 'postcode_search_shortcode' );
