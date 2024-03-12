// let tmpl = document.createElement("template");
import { CustomToggleHTML } from "./html/CustomToggleHTML.js";
let html = CustomToggleHTML();

class CustomToggle extends HTMLElement {
    constructor() {
        super();
        this.addEventListener("click", this.toggle);
        this.icons = { negative: "unpublished", positive: "check_circle" };  
    }

    connectedCallback() {
        this.innerHTML =html;
        if (this.hasAttribute("tags")) {
            this.tags = this.getTags();
            const labels = this.querySelectorAll("span.label-value");
            labels.forEach((label, index) => {
                label.textContent = this.tags[index].split(":")[0];
            });

            if (
                this.hasAttribute("value") &&
                this.getAttribute("value") != ""
            ) {
                this.assignValue(this.getAttribute("value"));
            } else {
                this.assignValue(this.tags[0].split(":")[1]);
            }
        }
    }

    getTags(index = null) {
        this.tags = this.getAttribute("tags").split("|");
        return index != null && index < 2 ? this.tags[index] : this.tags;
    }

    static get observedAttributes() {
        return ["value"];
    }

    attributeChangedCallback(name, oldValue, newValue) {}
    
    toggle() {
        let input = this.querySelector("input#toggle");

        input.checked = !input.checked;
        input.value = !input.checked
            ? this.tags[0].split(":")[1]
            : this.tags[1].split(":")[1];
        let icon = input.checked ? this.icons.positive : this.icons.negative;
        this.querySelector(".thumb span").textContent = icon;
        this.setAttribute("value", input.value);
    }

    assignValue(value) {
        let input = document.querySelector("input#toggle");
        let span = document.querySelector(".thumb span");
        switch (value) {
            case this.tags[0].split(":")[1]:
                input.checked = false;
                span.textContent = this.icons.negative;
                break;
            case this.tags[1].split(":")[1]:
                input.checked = true;
                span.textContent = this.icons.positive;
                break;
            default:
                input.checked = false;
                input.value = this.tags[0].split(":")[1];
                span.textContent = this.icons.negative;
                break;
        }
    }
}

customElements.define("custom-toggle", CustomToggle);
