
// Fetch data from the countrier+cities.json file 


let countrysAndCitys = [];


async function getData() {
    const fetchedData = await fetch('countries+cities.json');
    countrysAndCitys = await fetchedData.json();

    for (let placeObject of countrysAndCitys) {
        // ------------ Adding list of countries --------------// 
        // create option element 
        let optionElmCountry = document.createElement('option');
        // create content 
        let contentCountry = document.createTextNode(placeObject.name);

        // add contentCountry 
        optionElmCountry.appendChild(contentCountry);

        // add the value attribut ( optionnal )
        optionElmCountry.setAttribute('value', placeObject.name);

        // adding this element to the document
        document.getElementById('pays').appendChild(optionElmCountry);
    }


};


function handleChangeCountry(selectedCountry) {

    // Empty 
    let elementSelect = document.getElementById('ville');
    elementSelect.innerHTML = '<option value="autre" > autre -- </option>';


    let countruAndCityObject = countrysAndCitys.find(c =>
        c.name == selectedCountry.value
    );
    
    countruAndCityObject.cities.forEach(element => {

        let optionElmCity = document.createElement('option');
        let contentCountry = document.createTextNode(element);
        optionElmCity.append(contentCountry);

        elementSelect.append(optionElmCity);
    })
}

getData();



    // console.log(selectedCountry.value); delete
    // console.log(countrysAndCitys[2].name);
    // console.log(countrysAndCitys[2].cities[2]); 

  // console.log(countruAndCityObject.name);
    // console.log(countruAndCityObject.cities[1]);

    // let tab = [
    //     { name: "hello", cities: [1, 2, 3, 4] },
    //     { name: "Morocco", cities: [5, 6, 7, 8] }
    // ];

    // let select = tab.find(elm =>  elm.name == "Morocco" );
    // console.log(select.cities[2]);


