// Permet de faire que le graphique soit proportionnel à la taille
// https://stackoverflow.com/questions/41319720/make-google-chart-responsive


/**
 * Tools in js of the project
 */
class LToolsJS {
    /**
     * Show a modal
     * @param {string} nameModal name of the modal
     */
    static showModal(nameModal) {
        var myModal = new bootstrap.Modal(document.getElementById(nameModal), {
            keyboard: false
        })
        myModal.show();
    }

    static showSuccessModal(nameModal, isSuccess) {
        if(isSuccess) {
            this.showModal(nameModal);
        }
    }
}

