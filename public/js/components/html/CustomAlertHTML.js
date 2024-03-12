export function CustomAlertHTML(){

return /*html*/`
<dialog id="alert">
    <span id="closeAlert" title="Close">
        <span class="material-symbols-outlined">cancel</span>
    </span>
    <div id=alertHeader>
        <span class="material-symbols-outlined icon-alert" style="font-size: 4rem !important">
            notification_important
        </span>
        <span id="title"></span>
    </div>
    <div id="alertBody">
        <p>
        </p>
    </div>
    <div class="footer-buttons twobuttonFooter">
        <button id="cancel" class="button positive">Cancel <span class="material-symbols-outlined">cancel</span></button>
        <button id="accept" class="button negative">Accept<span class="material-symbols-outlined">check_circle</span></button>
    </div>
</dialog>
`;
}