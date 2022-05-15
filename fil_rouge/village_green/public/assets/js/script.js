$(document).ready(function () {
    $('[data-toggle="popover"]').popover({trigger: "hover", container: 'body'});

    //console.log(panier)
function updatePanier(count){
    let panier = document.getElementsByClassName('badge badge-pill badge-danger');
    for (let i = 0; i < panier.length; i += 1) {

        console.log(parseInt(panier[i].innerHTML))
        panier[i].innerHTML = count;
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
        }).done(function (response) { //
            //     console.log(formData);
            //  $(this).form().getElementsByTagName('qte').val() = formData.qte;

            // const obj = response;
            // //
            //  let resultat = 0;
            // //
            // for (let i = 0; i < obj.length; i += 1) {
            //
            //     resultat +=  parseInt(obj[cart].qte);
            //     console.log('teste addition '+resultat)
            //
            // }
            let resultat = 0;
            $.each(response, function(key, val) {
                console.log(val.qte);
                 resultat += parseInt(val.qte);
            });
            console.log(response);
            updatePanier(resultat)


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