let reqs_id = 0;
let in_id = 0;

let ingredienstsShortage = [{}];

function removeElement(ev) {
    // console.log(ev);
    let button = ev.target;
    let div = button.parentElement;
    button.parentNode.parentNode.removeChild(div);
}

function add() {
    let formIngredient = document.getElementById("formIngredient");
    let innerIngredient = document.getElementById("innerIngredient");
    cloneIngredient = innerIngredient.cloneNode(true);
    in_id++; // increment in_id to get a unique ID for the new element
    cloneIngredient.setAttribute('id', 'inner' + in_id);

    formIngredient.appendChild(cloneIngredient);

    //create remove button
    let remove = document.createElement('button');
    remove.setAttribute('id', 'inner' + in_id);
    remove.onclick = function (e) {
        removeElement(e)
    };
    remove.setAttribute("type", "button");
    remove.innerHTML = "Usuń";

    cloneIngredient.appendChild(remove);
}

function addIngredientStart() {
    let ingredientStart = document.getElementById("ingredientStart").value;
    ingredientStart = {
        'id': ingredientStart
    };
    sessionStorage.setItem("ingredientStart", JSON.stringify(ingredientStart));
}

// dodaje do tablicy składnik którego brakuje, ajaxem pobiera listę przepisów bez tego składnika
function turnOffIngredient() {
    $(".switchIngredient").change(function (index, element) {
        let id = $(this).attr("data-ingredient-id");

        if (($("[data-ingredient-id = " + id + "]").is(":checked") == false)) {
            ingredientsShortage = JSON.parse(sessionStorage.getItem("ingredientsShortage"));
            ingredientStart = JSON.parse(sessionStorage.getItem("ingredientStart"));

            if (ingredientsShortage != null) {
                ingredientsShortage[ingredientsShortage.length] = ({
                    'id': id
                });
                sessionStorage.setItem("ingredientsShortage", JSON.stringify(ingredientsShortage));
            } else {
                ingredientsShortage = [{
                    'id': id
                }];
                sessionStorage.setItem("ingredientsShortage", JSON.stringify(ingredientsShortage));
            }

            $.ajax({
                url: "/wybrane-przepisy", //wymagane, gdzie się łączymy
                method: "get", //typ połączenia, domyślnie get
                contentType: 'application/json', //gdy wysyłamy dane czasami chcemy ustawić ich typ
                dataType: 'html', //typ danych jakich oczekujemy w odpowiedzi
                data: { //dane do wysyłki
                    ingredientStart: sessionStorage.getItem("ingredientStart"),
                    ingredientsShortage: sessionStorage.getItem("ingredientsShortage")
                },
                success: function (result) {
                    $("#listRecipes").html(result);

                    //nadanie nazwie składnika szarego koloru i przekreślenia                
                    $("#ingredientsList" + id).addClass("noActive");
                }
            });

        } else {
            let id = $(this).attr("data-ingredient-id");
            ingredientsShortage = JSON.parse(sessionStorage.getItem("ingredientsShortage"));

            // znajduje w tablicy obiektów ten, który chcemy przywrócić i usuwa z tej tablicy
            ingredientsShortage.splice(ingredientsShortage.findIndex(v => v.id === id), 1);

            sessionStorage.setItem("ingredientsShortage", JSON.stringify(ingredientsShortage));

            $("#ingredientsList" + id).removeClass("noActive");

            $.ajax({
                url: "/wybrane-przepisy", //wymagane, gdzie się łączymy
                method: "get", //typ połączenia, domyślnie get
                contentType: 'application/json', //gdy wysyłamy dane czasami chcemy ustawić ich typ
                dataType: 'html', //typ danych jakich oczekujemy w odpowiedzi
                data: { //dane do wysyłki
                    ingredientStart: sessionStorage.getItem("ingredientStart"),
                    ingredientsShortage: sessionStorage.getItem("ingredientsShortage")
                },
                success: function (result) {
                    $("#listRecipes").html(result);
                }
            });

        }
    });
}

function markMonth() {
    let today = new Date();
    let todayMonth = today.getUTCMonth();

    let monthsIngredients = document.getElementsByTagName('h2');
    monthsIngredients[todayMonth].parentElement.classList.add("todayMonth");;
}

$().ready(function () {
    let sName = "cookiesok";
    $("#close-cookie-warn").click(function () {
        var oExpire = new Date();
        oExpire.setTime((new Date()).getTime() + 3600000 * 24 * 365);
        document.cookie = sName + "=1;expires=" + oExpire;
        $("#cookie-warn").hide("slow");
    });

    let sStr = '; ' + document.cookie + ';';
    let nIndex = sStr.indexOf('; ' + escape(sName) + '=');
    if (nIndex === -1) {
        $("#cookie-warn").show();
    }
});

$(document).ready(function () {
    $("#menuToggle input").on("click", function () {
        $("a.nav-item").toggleClass("nav-item");
        $("li.nav-item").toggleClass("nav-item");
    });
});
