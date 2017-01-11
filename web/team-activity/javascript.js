
function btnClicked() {
    alert("Clicked!");
}

function updateColor1() {
    var colorRequested = document.getElementById("changeColor1").value;
    var div1 = document.getElementById("firstDiv")
    div1.style.backgroundColor = colorRequested;
}