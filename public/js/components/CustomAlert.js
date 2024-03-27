import { CustomAlertHTML } from "./html/CustomAlertHTML.js";

const html = CustomAlertHTML();

class CustomAlert extends HTMLElement {
    constructor() {
        super();
        this.colors = {
            success: "var(--blue-corp)",
            error: "var(--red-corp)",
            warn: "var(--orange-corp)",
        };
    }

    connectedCallback() {
        this.innerHTML = html;
        this.alertModal = document.querySelector("dialog#alert");

        const closeBtn = this.alertModal.querySelector("span#closeAlert");
        const footer = this.alertModal.querySelector(".footer-buttons");

        footer.addEventListener("click", (e) => {
            if (e.target !== footer) {
                this.buttonId=e.target.id;
                this.remove()}
        });

        closeBtn.addEventListener("click", () => {
            this.alertModal.close();
        });

        this.setContent();
        this.alertModal.showModal();
    }

    disconnectedCallback() {
        if (this.hasAttribute(`${this.buttonId}-event`)) {
            const closeEvent = this.getAttribute(`${this.buttonId}-event`);
            eval(closeEvent);
        }
    }

    setContent() {
        const type = this.getAttribute("type");
        const title = this.getAttribute("header");
        const message = this.getAttribute("message");

        if(type!="warn"){
            this.alertModal.querySelector("button#cancel").style.display="none";
        }

        this.alertModal.querySelector("span.icon-alert").style.color =
            this.colors[type];
            this.alertModal.querySelector("span#title").style.color =
            this.colors[type];    
        this.alertModal.querySelector("#alertHeader span#title").textContent =
            title;
        this.alertModal.querySelector("div#alertBody p").textContent = message;
    }
}

customElements.define("custom-alert", CustomAlert);
