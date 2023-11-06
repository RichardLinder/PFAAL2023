    // creation des button virtuel de js
    const buttonZeros = document.getElementById("suivantZero");
    const buttonUn = document.getElementById("suivantUn");
    const buttonPUn = document.getElementById("PrecedentUn");
    const buttonPDeux = document.getElementById("PrecedentDeux");


    // creation des 
    const devisUn = document.getElementById("devisUn");
    const devisDeux = document.getElementById("devisDeux");
    const devisTrois = document.getElementById("devisTrois");



    // function bouton suivant 
    buttonZeros.addEventListener("click", (event) => { 


        devisUn.classList.add("cacheDevis");
        devisDeux.classList.remove("cacheDevis");

    });

    buttonUn.addEventListener("click", (event) => { 


        devisDeux.classList.add("cacheDevis");
        devisTrois.classList.remove("cacheDevis");

    });


    // function bouton  précédent 

    buttonPUn.addEventListener("click", (event) => { 


        devisDeux.classList.add("cacheDevis");
        devisUn.classList.remove("cacheDevis");

    });

    buttonPDeux.addEventListener("click", (event) => { 


        devisTrois.classList.add("cacheDevis");
        devisDeux.classList.remove("cacheDevis");

    });