/**
* Google Place API
*/
let autocomplete;
let autocomplete1;
let address1Field;
let address2Field;
let address3Field;

function initAutocomplete() {
  address1Field = document.querySelector("#kundali-location");
  address2Field = document.querySelector("#panchang-location");
  address3Field = document.querySelector("#panchang-moon-location");
  address4Field = document.querySelector("#boy-location");
  address5Field = document.querySelector("#girl-location");
  // Create the autocomplete object, restricting the search predictions to
  // addresses in the US and Canada.
  autocomplete = new google.maps.places.Autocomplete(address1Field, {
    fields: ["formatted_address", "geometry", "name"],
    types: ["(cities)"],
  });
  autocomplete1 = new google.maps.places.Autocomplete(address2Field, {
    fields: ["formatted_address", "geometry", "name"],
    types: ["(cities)"],
  });
  autocomplete2 = new google.maps.places.Autocomplete(address3Field, {
    fields: ["formatted_address", "geometry", "name"],
    types: ["(cities)"],
  });
   autocomplete3 = new google.maps.places.Autocomplete(address4Field, {
    fields: ["formatted_address", "geometry", "name"],
    types: ["(cities)"],
  }); 
  autocomplete4 = new google.maps.places.Autocomplete(address5Field, {
    fields: ["formatted_address", "geometry", "name"],
    types: ["(cities)"],
  });
  address1Field.focus();
  address2Field.focus();
  address3Field.focus();
  address4Field.focus();
  address5Field.focus();
  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener("place_changed", fillInAddress);
  autocomplete1.addListener("place_changed", fillInPanchangAddress);
  autocomplete2.addListener("place_changed", fillInPanchangMoonAddress);
  autocomplete3.addListener("place_changed", fillInPanchangMoonAddress);
  autocomplete4.addListener("place_changed", fillInPanchangMoonAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete.getPlace();
  let address1 = "";
  let postcode = "";

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  // place.address_components are google.maps.GeocoderAddressComponent objects
  // which are documented at http://goo.gle/3l5i5Mr
  for (const component of place.address_components) {
    const componentType = component.types[0];

    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`;
        break;
      }

      case "route": {
        address1 += component.short_name;
        break;
      }
    }
  }
  address1Field.value = address1;
}

function fillInPanchangAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete1.getPlace();
  let address1 = "";
  let postcode = "";

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  // place.address_components are google.maps.GeocoderAddressComponent objects
  // which are documented at http://goo.gle/3l5i5Mr
  for (const component of place.address_components) {
    const componentType = component.types[0];

    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`;
        break;
      }

      case "route": {
        address1 += component.short_name;
        break;
      }
    }
  }
  address2Field.value = address1;
}

function fillInPanchangMoonAddress() {
  // Get the place details from the autocomplete object.
  const place = autocomplete2.getPlace();
  let address1 = "";
  let postcode = "";

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  // place.address_components are google.maps.GeocoderAddressComponent objects
  // which are documented at http://goo.gle/3l5i5Mr
  for (const component of place.address_components) {
    const componentType = component.types[0];

    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`;
        break;
      }

      case "route": {
        address1 += component.short_name;
        break;
      }
    }
  }
  address3Field.value = address1;
}