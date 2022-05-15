$(document).ready(function () {
    $('[data-toggle="popover"]').popover({trigger: "hover", container: 'body'});

    //console.log(panier)
    function updateCountPanier(count) {
        let panier = document.getElementsByClassName('badge badge-pill badge-danger');
        for (let i = 0; i < panier.length; i += 1) {

            // console.log(parseInt(panier[i].innerHTML))
            panier[i].innerHTML = count;
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
        event.preventDefault();
        // console.log(event.target.action)
        let formData = $(this).serialize();
        $.ajax({
            url: event.target.action,
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
                let teste = ` <p><img height='50px' src='/assets/src/${val.photo}' alt='${val.name}'> ${val.name}</p>
<p>Quantité : <span class='text-success'>${val.qte}</span>  Prix : <span class='text-success'>${val.prix}€</span></p><hr>
`
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
    });
});