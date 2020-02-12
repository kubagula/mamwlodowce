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
    var remove = document.createElement('button');
    remove.setAttribute('id', 'inner' + in_id);
    remove.onclick = function(e) {
      removeElement(e)
    };
    remove.setAttribute("type", "button");
    remove.innerHTML = "Usuń";
    
    cloneIngredient.appendChild(remove);
}

function addIngredientStart() {
    let ingredientStart = document.getElementById("ingredientStart").value;
    ingredientStart = {'id': ingredientStart};
    sessionStorage.setItem("ingredientStart", JSON.stringify(ingredientStart));     
}

// dodaje do tablicy składnik którego brakuje, ajaxem pobiera listę przepisów bez tego składnika
function turnOffIngredient() { 
    $(".imageOk").click(function(index, element) {
        restoreIngredient($(this));
    });

    $(".deleteIngredient").click(function(index, element) {    
        let id = $(this).attr("data-ingredient-id");
        console.log("dodanie do tablicy");       

        ingredientsShortage = JSON.parse(sessionStorage.getItem("ingredientsShortage"));
        ingredientStart = JSON.parse(sessionStorage.getItem("ingredientStart"));

        if(ingredientsShortage != null) {        
            ingredientsShortage[ingredientsShortage.length] = ({'id': id});        
            sessionStorage.setItem("ingredientsShortage", JSON.stringify(ingredientsShortage));        
        } else {
            ingredientsShortage = [{'id': id}];
            sessionStorage.setItem("ingredientsShortage", JSON.stringify(ingredientsShortage));        
        }    

        //okejce usunięcie invisible            
            $("[data-ingredient-id-ok='"+id+"']").show();
            //krzyżykowi nadanie stylu invisible
            $("[data-ingredient-id='"+id+"']").hide();
        
        $.ajax({
        url         : "/wybrane-przepisy", //wymagane, gdzie się łączymy
        method      : "get", //typ połączenia, domyślnie get
        contentType : 'application/json', //gdy wysyłamy dane czasami chcemy ustawić ich typ
        dataType    : 'html', //typ danych jakich oczekujemy w odpowiedzi
        data        : { //dane do wysyłki
            ingredientStart : sessionStorage.getItem("ingredientStart"),
            ingredientsShortage : sessionStorage.getItem("ingredientsShortage")
        },
        success: function(result){
            $("#listRecipes").html(result);           

            //nadanie nazwie składnika szarego koloru i przekreślenia
            // $("[data-ingredient-id='"+id+"']").parent("p").addClass("noActive");
            $("#ingredientsList"+id).addClass("noActive");

            
            // $("[data-ingredient-id='"+id+"']").unbind('click');

            // //okejce usunięcie invisible            
            // $("[data-ingredient-id-ok='"+id+"']").show();          
            

            console.log("ustawienie przywracania");       
          }
        });

    });     
}

function markMonth() {
    let today = new Date();    
    let todayMonth = today.getUTCMonth();    

    let monthsIngredients = document.getElementsByTagName('h2');
    monthsIngredients[todayMonth].parentElement.classList.add("todayMonth");;
}


function restoreIngredient(e) {
    console.log(e);
    console.log("kliknięcie w przywróć");
    let id = $(e).attr("data-ingredient-id-ok");
    ingredientsShortage = JSON.parse(sessionStorage.getItem("ingredientsShortage"));    

    // znajduje w tablicy obiektów ten, który chcemy przywrócić i usuwa z tej tablicy
    ingredientsShortage.splice(ingredientsShortage.findIndex(v => v.id === id), 1);
    
    sessionStorage.setItem("ingredientsShortage", JSON.stringify(ingredientsShortage)); 
console.log(id);
            $("#ingredientsList"+id).removeClass("noActive");
            $("[data-ingredient-id='"+id+"']").show();
            $("[data-ingredient-id-ok='"+id+"']").hide();
    // $("[data-ingredient-id='"+id+"']").unbind('click');
    // $("[data-ingredient-id='"+id+"']").attr('onClick', 'turnOffIngredient();');

    console.log("zrobienie aktywnego");
    $.ajax({
        url         : "/wybrane-przepisy", //wymagane, gdzie się łączymy
        method      : "get", //typ połączenia, domyślnie get
        contentType : 'application/json', //gdy wysyłamy dane czasami chcemy ustawić ich typ
        dataType    : 'html', //typ danych jakich oczekujemy w odpowiedzi
        data        : { //dane do wysyłki
            ingredientStart : sessionStorage.getItem("ingredientStart"),
            ingredientsShortage : sessionStorage.getItem("ingredientsShortage")
        },
        success: function(result){
            $("#listRecipes").html(result);
            // $("[data-ingredient-id='"+id+"']").siblings().addClass("noActive");
            // $("[data-ingredient-id='"+id+"']").unbind('click');
            // $("[data-ingredient-id='"+id+"']").attr('onClick', 'restoreIngredient(this);');
            // $("[data-ingredient-id='"+id+"']").siblings().removeClass("noActive");

          }
        });  
}

// $(".ok2").hide();