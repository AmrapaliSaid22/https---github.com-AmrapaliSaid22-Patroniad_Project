
var sig = $('#sig').signature({ syncField: '#signature64', syncFormat: 'PNG' });
        $('#clear').click(function (e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });





// var canvas = document.getElementById('signatureCanvas');
// var ctx = canvas.getContext('2d');
// var painting = false;

// function getMousePos(canvas, e) {
//     var rect = canvas.getBoundingClientRect();
//     return {
//         x: e.clientX - rect.left,
//         y: e.clientY - rect.top
//     };
// }

// function startPosition(e) {
//     painting = true;
//     var pos = getMousePos(canvas, e);
//     draw(pos);
// }

// function endPosition() {
//     painting = false;
//     ctx.beginPath();
// }

// function draw(e) {
//     if (!painting) return;
//     ctx.lineWidth = 2;
//     ctx.lineCap = 'round';
//     ctx.strokeStyle = 'black';

//     ctx.lineTo(e.x, e.y);
//     ctx.stroke();
//     ctx.beginPath();
//     ctx.moveTo(e.x, e.y);
// }

// canvas.addEventListener('mousedown', function(e) {
//     e.preventDefault();
//     e.stopPropagation();
//     startPosition(e);
// });

// canvas.addEventListener('mouseup', function(e) {
//     e.preventDefault();
//     e.stopPropagation();
//     endPosition();
// });

// canvas.addEventListener('mousemove', function(e) {
//     e.preventDefault();
//     e.stopPropagation();
//     var pos = getMousePos(canvas, e);
//     draw(pos);
// });

