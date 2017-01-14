
function changeDirection() {
    alert("Clicked!");
}

function updateColor1() {
    var colorRequested = document.getElementById("changeColor1").value;
    var div1 = document.getElementById("firstDiv");
    div1.style.backgroundColor = colorRequested;
}
function updateColor2() {
    var colorRequested = document.getElementById("changeColor2").value;
    var div2 = document.getElementById("secondDiv");
    div2.style.backgroundColor = colorRequested;
}