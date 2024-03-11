let tmpl = document.createElement('template');
tmpl.innerHTML = `
<style>
    .switchContent {
        display: inline-flex;
        align-items: center;
    }

    .switchContent span.label-value {
        /* font-size: 1.4rem; */
        margin: 0 0.5rem;
        max-width: 7rem;
    }

    span.inputName{
        display: inline-flex;
        min-width: 200px;
    }

    .switch {
        width: 34px;
        height: 19px;
        background-color: #7b7b7b1a;
        border-radius: 10px;
        position: relative;
        border: 1px solid #7b7b7b1a;
        transition: 0.3s;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
    }

    .switch:hover {
        border: 1px solid #ff004f;
        transition: 0.3s;
    }


    .thumb {
        width: 17px;
        height: 17px;
        background-color: #ff004f;
        left: 0;
        transition: 0.3s;
        position: absolute;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    .switch input[type="checkbox"]:checked+.thumb {
        background-color: var(--blue-corp);
        left: calc(100% - 17px);
        transition: 0.3s;
    }

    .switch:has(input[type="checkbox"]:checked):hover {
        border: 1px solid var(--blue-corp);
        transition: 0.3s;
    }

    .switch input[type="checkbox"] {
        display: none;
    }
</style>
<label for="toggle"><span class="inputName"> <slot name="description"> </slot> <span>
    <div class="switchContent">
        <span class="label-value off" data-icon="block" data-value="N"></span
        >
        <div class=" switch">
            <input
                type="checkbox"
                id="toggle"
                name="toggle"
            />
            <div class="thumb">
                <span class="material-symbols-outlined"></span>
            </div>
        </div>
        <span
            class="label-value on"
            data-icon="check_circle"
            data-value="S"></span>
    </div></label>`;


class CustomToggle extends HTMLElement {
    constructor() {
        super();
        this.addEventListener('click', this.toggle);   
        let shadowRoot = this.attachShadow({mode: 'open'});
        shadowRoot.appendChild(tmpl.content.cloneNode(true));
    }
    
    connectedCallback(){
        if(this.hasAttribute('tags')){
            // let tags = this.getTags();
            this.tags = this.getTags();
            console.log(this.tags);
            const labels=this.shadowRoot.querySelectorAll("span.label-value")
            labels.forEach((label, index)=>{
                label.textContent=this.tags[index].split(":")[0];
            })
        }
        this.toggle();

    }

    getTags(index=null){
        this.tags = this.getAttribute("tags").split("|")
        return index!=null && index<2 ? this.tags[index]: this.tags
    }

    static get observedAttributes() {
        return ['actived'];
    }

    attributeChangedCallback(name, oldValue, newValue) {
         
    }

    toggle() {

        let input = this.shadowRoot.querySelector("input#toggle") 

        this.actived = !this.actived;
        input.value = !input.checked ? this.tags[0].split(":")[1] : this.tags[1].split(":")[1];
        // checkbox.icon = checkbox.checked ? iconOn : iconOff;
        // document.querySelector(".thumb span").textContent = checkbox.icon;
    }
}

customElements.define("custom-toggle", CustomToggle);
