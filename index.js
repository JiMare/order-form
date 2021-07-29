
function handleCount(idPlus, idMinus, counter){
    const btnPlus = document.querySelector(`#${idPlus}`);
    const btnMinus = document.querySelector(`#${idMinus}`);
    const count = document.querySelector(`#${counter}`);
    
    btnPlus.addEventListener('click', (event) => {
        event.preventDefault();  
        if(parseInt(count.value) + 1 <= 25){
           count.value++;
            
        }
    })
    
    btnMinus.addEventListener('click', (event) => {
        event.preventDefault();
        if(parseInt(count.value) - 1 >= 0){
            count.value--;
        }       
    })
}

handleCount('ntbPlus', 'ntbMinus', 'ntbCount');
handleCount('photoPlus', 'photoMinus', 'photoCount');
handleCount('phonePlus', 'phoneMinus', 'phoneCount');