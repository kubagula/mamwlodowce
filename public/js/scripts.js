let reqs_id = 0;
let in_id = 0;

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