document.head.innerHTML += /* html */
  `<style>
    mi-footer {display: block; background-color: sandybrown; text-align: center; }
  </style>`;
customElements.define("mi-footer", class extends HTMLElement {
  connectedCallback() {
    this.textContent = "Copyright © 2021 Leonardo Calvillo Tapia.";
  }
});