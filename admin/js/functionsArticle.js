function deleteArticle(id) {
    try {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajaxMessages").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "index.php?view=article&action=delete&id=" + id, true);
        xmlhttp.send();
    } catch (e) {
        echo("Doslo je do greske prilikom brisanja artikla. Pokusajte ponovo.");

    }
}

function editArticle(id) {
    try {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajaxMessages").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "index.php?view=article&action=edit&id=" + id, true);
        xmlhttp.send();
    } catch (e) {
        echo("Doslo je do greske prilikom izmjene artikla. Pokusajte ponovo.");
    }
}

function deleteUser(id) {
    try {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajaxMessages").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "index.php?view=user&action=delete&id=" + id, true);
        xmlhttp.send();
    } catch (e) {
        echo("Doslo je do greske prilikom brisanja korisnika. Pokusajte ponovo.");
    }
}

function editUser(id) {
    try {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajaxMessages").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "index.php?view=user&action=edit&id=" + id, true);
        alert("Slanje zahtjeva: " + "index.php?view=user&action=edit&id=" + id);
        xmlhttp.send();
        alert("Zahtjev poslat: " + "index.php?view=user&action=edit&id=" + id);
    } catch (e) {
        echo("Doslo je do greske prilikom izmjene korisnika. Pokusajte ponovo.");
    }
}