const modal = document.getElementById("miModal");

if (modal !== null) {
    const cerrarBtn = modal.querySelector("a#cerrarModal");

    cerrarBtn.addEventListener("click", () => {
        modal.close();
    });

    window.onload = function () {
        modal.showModal();
    };

    let inputs=document.querySelectorAll('form input')

    inputs.forEach(input=>{
        input.addEventListener('focus', ()=>{
            input.previousElementSibling.classList.add("focus");
        })
        input.addEventListener('blur', ()=>{
            input.previousElementSibling.classList.remove("focus");
        })
    })

    let valueOn=document.querySelector("span.on").dataset.value;
    let valueOff=document.querySelector("span.off").dataset.value;
    document.querySelector(".thumb").textContent=valueOff;
    let checkbox = document.getElementById("toggle");
    if(!document.querySelector("#editMode")) checkbox.value=valueOff;
    
    function toggle() {
        checkbox.checked = !checkbox.checked;
        checkbox.value = checkbox.checked ? valueOn : valueOff;
        document.querySelector(".thumb").textContent=checkbox.value;

      }
      
      document.querySelector(".switch").addEventListener("click", toggle)

      if (document.querySelector("#editMode") && document.querySelector("input#toggle").value == 'Y') toggle();

      let alertDiv = document.querySelector('div.alert')
      alertDiv.addEventListener('click', ()=>{
        alertDiv.style.display='none';
      })
}