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

// dodaje do tablicy składnik którego brakuje
function addSessionStorageShortage(id) {
    ingredientsShortage = JSON.parse(sessionStorage.getItem("ingredientsShortage"));
    ingredientStart = JSON.parse(sessionStorage.getItem("ingredientStart"));

    if(ingredientsShortage != null) {        
        ingredientsShortage[ingredientsShortage.length] = ({'id': id});        
        sessionStorage.setItem("ingredientsShortage", JSON.stringify(ingredientsShortage));        
    } else {
        ingredientsShortage = [{'id': id}];
        sessionStorage.setItem("ingredientsShortage", JSON.stringify(ingredientsShortage));        
    }    
    
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
      }
    }); 
}

function markMonth() {
    let today = new Date();    
    let todayMonth = today.getUTCMonth();
    console.log(todayMonth);

    let monthsIngredients = document.getElementsByTagName('h2');
    monthsIngredients[todayMonth].parentElement.classList.add("todayMonth");;
}
