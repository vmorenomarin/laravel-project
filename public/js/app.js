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
    let iconOn=document.querySelector("span.on").dataset.icon;
    let iconOff=document.querySelector("span.off").dataset.icon;
    document.querySelector(".thumb span").textContent=iconOff;
    let checkbox = document.getElementById("toggle");
    if(!document.querySelector("#editMode")) checkbox.value=valueOff;
    
    function toggle() {
        checkbox.checked = !checkbox.checked;
        checkbox.value = checkbox.checked ? valueOn : valueOff;
        checkbox.icon = checkbox.checked ? iconOn : iconOff;
        document.querySelector(".thumb span").textContent=checkbox.icon;

      }
      
      document.querySelector(".switch").addEventListener("click", toggle)

      if (document.querySelector("#editMode") && document.querySelector("input#toggle").value == 'Y') toggle();

      let alertDiv = document.querySelector('div.alert')
      alertDiv.addEventListener('click', ()=>{
        alertDiv.style.display='none';
      })
}