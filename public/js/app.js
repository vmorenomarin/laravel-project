
if (document.getElementById("miModal")!== null) {
    let modalDialog = document.getElementById("miModal");
    const cerrarBtn = modalDialog.querySelector("a#cerrarModal");

    cerrarBtn.addEventListener("click", () => {
        modalDialog.close();
    });

    window.onload = function () {
        modalDialog.showModal();
    };

    let inputs = document.querySelectorAll("form input");

    inputs.forEach((input) => {
        input.addEventListener("focus", () => {
            input.previousElementSibling.classList.add("focus");
        });
        input.addEventListener("blur", () => {
            input.previousElementSibling.classList.remove("focus");
        });
    });
}

function alertExecution(
    type,
    header,
    message,
    accetpEvent = null,
    cancelEvent = null
) {
    try {
        if (!type || !header || !message) {
            throw new Error("Not enough parameters to build and launch alert.");
        }
        let alert = document.createElement("custom-alert");

        alert.setAttribute("type", type);
        alert.setAttribute("header", header);
        alert.setAttribute("message", message);
        if (accetpEvent) alert.setAttribute("accept-event", accetpEvent);
        if (cancelEvent && type == "warn")
            alert.setAttribute("cancel-event", cancelEvent);

        document.querySelector("body > div#app").appendChild(alert);
    } catch (error) {
        console.error(error.message);
    }
};
