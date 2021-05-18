window.addEventListener("load", () => {
    let long;
    let lat;
    let location = document.querySelector(".location-timezone");
    let description = document.querySelector(".description");
    let temperature_c = document.querySelector(".degree");
    let e = document.querySelector(".icon");

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            console.log(position)

            lat = position.coords.latitude;
            long = position.coords.longitude;

            console.log(lat,long);
            const proxy = 'https://cors-anywhere.herokuapp.com/'
            const api = `${proxy}http://api.weatherapi.com/v1/current.json?key=87ab8c689ac045aa9c5134859203008&q=${lat},${long}`
            
            
            fetch(api)
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    console.log(data.current.temp_c);
                    const {temp_c} = data.current;
                    const {text, icon, code} = data.current.condition;
                    const {name, region} = data.location;

                    temperature_c.textContent = temp_c;
                    location.textContent = `${name}`;
                    description.textContent = text;
                    e.setAttribute('src', `${icon}`);
                    
                });

        });

    }
});

/*
 const {temp_c} = data.current;
 const {text, icon, code} = data.current.condition;
 const {name, region} = data.current.location;

 //set dom elements as per data fetched
 location.textContent = name;
 weather_icon.textContent = icon;
 description.textContent = text;
 temperature_c.textContent = temp_c;
 
 */