<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google Autocomplete in Laravel - shouts.dev</title>
</head>

<body>
<div class="container mt-5">
    <h2>Google Autocomplete Address in Laravel - shouts.dev</h2>
    <div class="form-group">
        <label>Location/City/Address</label>
        <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Choose Location">
    </div>
</div>


<script>
    function initMap() {
        const input = document.getElementById("autocomplete");

        const options = {
            fields: ["formatted_address", "geometry", "name"],
            strictBounds: false,
            types: ["establishment"],
        };

        const autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.addListener("place_changed", () => {
            const place = autocomplete.getPlace();

            if (!place.geometry || !place.geometry.location) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return false;
            }
        });
    }

    window.initMap = initMap;
</script>
<script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap&libraries=places&v=weekly" ></script>

</body>
</html>
