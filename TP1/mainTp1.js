
// Jobs : 
const jobsList = [
    { id: 1, nom: "Développeur" },
    { id: 2, nom: "Enseignant" },
    { id: 3, nom: "Médecin" },
    { id: 4, nom: "Pilote" },
    { id: 5, nom: "Menuisier" },
    { id: 6, nom: "Architecte" },
    { id: 7, nom: "Pharmacien" },
    { id: 8, nom: "Avocat" },
    { id: 9, nom: "Comptable" },
    { id: 10, nom: "Infirmier" },
    { id: 11, nom: "Électricien" },
    { id: 12, nom: "Plombier" },
    { id: 13, nom: "Cuisinier" },
    { id: 14, nom: "Serveur" },
    { id: 15, nom: "Caissier" },
    { id: 16, nom: "Graphiste" },
    { id: 17, nom: "Journaliste" },
    { id: 18, nom: "Photographe" },
    { id: 19, nom: "Vétérinaire" },
    { id: 20, nom: "Chauffeur" },
    { id: 21, nom: "Maçon" },
    { id: 22, nom: "Carreleur" },
    { id: 23, nom: "Coiffeur" },
    { id: 24, nom: "Esthéticienne" },
    { id: 25, nom: "Boulanger" },
    { id: 26, nom: "Pâtissier" },
    { id: 27, nom: "Ingénieur" },
    { id: 28, nom: "Mécanicien" },
    { id: 29, nom: "Magasinier" },
    { id: 30, nom: "Agent de sécurité" }
  ];
  
  jobsList.forEach( element => {
    let job = document.createElement( 'option');
    job.innerHTML = element.nom;
    job.value     = element.nom;

    document.getElementById("job").appendChild( job );
  });


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
    elementSelect.innerHTML = '<option value="" >autre</option>';


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


