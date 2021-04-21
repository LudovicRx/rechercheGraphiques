// Permet de faire que le graphique soit proportionnel à la taille
// https://stackoverflow.com/questions/41319720/make-google-chart-responsive


/**
 * Tools in js of the project
 */
class LToolsJS {
    /**
     * Show a modal
     * @param {string} nameModal name of the modal
     * @param {array} text text in the modal
     * @return {void}
     */
    static showModal(nameModal, text) {
        var containerModal = document.getElementById(nameModal);
        var bodyModal = containerModal.getElementsByClassName("modal-body")[0];
        bodyModal.innerHTML = "";
        for (const t of text) {
            bodyModal.innerHTML += t + "<br/>";
        }
        var myModal = new bootstrap.Modal(containerModal, {
            keyboard: false
        })
        myModal.show();
    }

    /**
     * Show the success or error modal
     * @param {string} nameModal name of the modal
     * @param {array} values values to write
     */
    static showSuccessErrorModal(nameModal, values) {
        if (values.length > 0) {
            this.showModal(nameModal, values);
        }
    }
}

