function zmien(newPage) {
	document.getElementById('ramka').src = newPage +".php";

}

function getSync() {
    console.log('getsync');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("response").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "request.php?sync=true", false);
    xhttp.send();
}

function postSync() {
    console.log('postsync');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("response").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("POST", "request.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("sync=true");
}

function getAsync() {
    console.log('getasync');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("response").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "request.php?sync=false", true);
    xhttp.send();
}

function postAsync() {
    console.log('postasync');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("response").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("POST", "request.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("sync=false");
}