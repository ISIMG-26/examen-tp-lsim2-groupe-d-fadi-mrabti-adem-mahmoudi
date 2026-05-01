// validation du formulaire d'ajout et de modification
function validateForm() {
    let titre = document.querySelector("input[name='titre']").value.trim();
    let prix = document.querySelector("input[name='prix']").value;
    let marque = document.querySelector("input[name='marque']").value.trim();
    let etat = document.querySelector("input[name='etat']").value.trim();
    let telephone = document.querySelector("input[name='telephone']").value.trim();
    let fichier = document.querySelector("input[name='fichier']");

    if (titre.length < 3) {
        alert("Le modele est trop court");
        return false;
    }

    if (prix === "" || prix <= 0) {
        alert("Le prix doit etre superieur a 0");
        return false;
    }

    if (marque === "") {
        alert("La marque est obligatoire");
        return false;
    }

    if (etat === "") {
        alert("L'etat du telephone est obligatoire");
        return false;
    }

    if (telephone === "") {
        alert("Le telephone du vendeur est obligatoire");
        return false;
    }

    if (telephone.length < 8 || telephone.length > 15) {
        alert("Le numero de telephone est invalide");
        return false;
    }

    if (fichier && fichier.value !== "") {
        let extension = fichier.value.split(".").pop().toLowerCase();

        if (extension !== "jpg" && extension !== "jpeg" && extension !== "png" && extension !== "webp") {
            alert("La photo doit etre JPG, PNG ou WEBP");
            return false;
        }
    }

    return true;
}

// register validation
function validateRegister() {
    let name = document.querySelector("input[name='name']").value.trim();
    let email = document.querySelector("input[name='email']").value;
    let password = document.querySelector("input[name='password']").value;

    if (name.length < 3) {
        alert("Le nom est trop court");
        return false;
    }

    if (!email.includes("@") || !email.includes(".")) {
        alert("Email invalide");
        return false;
    }

    if (password.length < 6) {
        alert("Mot de passe trop court");
        return false;
    }

    return true;
}

// validation du formulaire de connexion
function validateLogin() {
    let email = document.querySelector("input[name='email']").value;
    let password = document.querySelector("input[name='password']").value;

    if (!email.includes("@") || !email.includes(".")) {
        alert("Email invalide");
        return false;
    }

    if (password === "") {
        alert("Mot de passe obligatoire");
        return false;
    }

    return true;
}

// ancienne fonction de recherche simple
function searchProduct() {
    let value = document.getElementById("search").value;

    fetch("php/search.php?query=" + value)
    .then(response => response.text())
    .then(data => {
        document.querySelector(".products").innerHTML = data;
    });
}

// filtrage AJAX des annonces
function filterProduct() {
    let marque = document.getElementById("marque").value;
    let etat = document.getElementById("etat").value;
    let search = document.getElementById("search").value;
    let tri = document.getElementById("tri").value;

    fetch("php/filter.php?marque=" + marque + "&etat=" + etat + "&search=" + search + "&tri=" + tri)
    .then(response => response.text())
    .then(data => {
        document.querySelector(".products").innerHTML = data;
    });
}

// vider les filtres et afficher toutes les annonces
function clearFilter() {
    document.getElementById("search").value = "";
    document.getElementById("marque").value = "";
    document.getElementById("etat").value = "";
    document.getElementById("tri").value = "";

    filterProduct();
}

// ouvrir et fermer le menu lateral
function toggleMenu() {
    document.body.classList.toggle("menu-open");
}

// confirmation avant suppression d'une annonce
function confirmDelete() {
    return confirm("Voulez-vous vraiment supprimer cette annonce ?");
}
