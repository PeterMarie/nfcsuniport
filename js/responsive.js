
    function autoResizeDiv(){
        document.getElementById('fullbody').style.height = window.innerHeight +'px';
        }
    window.onload = autoResizeDiv;
    window.onresize = autoResizeDiv;

   