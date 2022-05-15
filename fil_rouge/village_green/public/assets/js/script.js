$(document).ready(function () {
    $('[data-toggle="popover"]').popover({trigger: "hover", container: 'body'});

    //console.log(panier)
    function updateCountPanier(count) {
        let panier = document.getElementsByClassName('badge badge-pill badge-danger');
        console.log(panier.length);
        if(panier.length>0){
        for (let i = 0; i < panier.length; i += 1) {

            // console.log(parseInt(panier[i].innerHTML))
            panier[i].innerHTML = count;
        }
        }else{

                let parentpanier = document.getElementsByClassName('bgcaddie');

                for (let i = 0; i < parentpanier.length; i += 1) {

                    // console.log(parseInt(panier[i].innerHTML))
                 //   parentpanier[i].innerHTML = count;
                    var newDiv = document.createElement("span");
                    newDiv.className  ="badge badge-pill badge-danger";
                    // et lui donne un peu de contenu
                    var newContent = document.createTextNode(count);
                    // ajoute le nœud texte au nouveau div créé
                    newDiv.appendChild(newContent);


                    // ajoute le nouvel élément créé et son contenu dans le DOM
                 //   var currentDiv = document.getElementById('div1');
                    parentpanier[i].parentNode.insertBefore(newDiv, parentpanier[i].nextSibling);



                }
        }
    }

    function updatePanier(newData) {
        let objpanier = document.getElementsByClassName('panier');
        for (let i = 0; i < objpanier.length; i += 1) {
            let dataVal = objpanier[i].getAttribute("data-content");
            objpanier[i].setAttribute("data-content", newData);
            // console.log(newData)
            // panier[i].innerHTML = count;
        }
    }

    $("form").submit(function (event) {
        console.log(event.target.action)
        const regex = "/paniers/add";
        const found = event.target.action.match(regex);
        console.log(found);
        if (found) {
            event.preventDefault();

            // console.log(event.target.action)
            let formData = $(this).serialize();

            $.ajax({
                url: event.target.action + '/json',
                type: "POST",
                dataType: 'json',
                data: formData
            }).done(function (response) {
                let resultat = 0;
                let prix = 0;
                let temp = "";
                $.each(response, function (key, val) {
                    // console.log(val.qte);
                    resultat += parseInt(val.qte);
                    prix += parseInt(val.prix) * parseInt(val.qte);
                    let teste = `<p><img height='50px' src='/assets/src/${val.photo}' alt='${val.name}'> ${val.name}</p>
<p>Quantité : <span class='text-success'>${val.qte}</span>  Prix : <span class='text-success'>${val.prix}€</span></p><hr>`
                    temp += teste;
                });
                let total = `<p>Total : <span class='text-success'>  ${prix} €</span> </p>`;
                temp = temp + total;
                // console.log(response);
                // console.log(prix);
                updateCountPanier(resultat)
                updatePanier(temp)


                //  console.log('teste addition '+obj)

//             for (let cart = 0; cart < response.length; cart += 1) {
// console.log(response[cart].qte)
//                 resultat +=  parseInt(response[cart].qte);
//                 updatePanier(resultat)
//                 console.log('teste addition '+resultat)
//
//             }

            });
        }
    });
});