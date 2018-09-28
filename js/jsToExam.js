console.log(nrPytania);
    if (nrPytania == 0) {
        document.getElementById('poprzednie').setAttribute('style', 'display:none');
    }
    else {
        document.getElementById('poprzednie').setAttribute('style', 'display:inline-block');
    }
    if (nrPytania == 19) {
        document.getElementById('nastepne').setAttribute('style', 'display:none');
    }
    else {
        document.getElementById('nastepne').setAttribute('style', 'display:inline-block');
    }

    function refreshDots(que, dots) {
        for (i = 1; i <= que; i++) {
            document.getElementById("dot-" + i).style.backgroundColor = "#00778f";
        }
        for (i = que + 1; i <= dots; i++) {
            document.getElementById("dot-" + i).style.backgroundColor = "#bbb";
        }
    }

        makeDots(dots);  //To robi kropki
        refreshDots(nrPytania, dots);   //To je zamalowuje

        if(action=="poprzednie"){
            nrPytania--;
        }
        else {
          nrPytania++;
        }

        if (nrPytania > 20) {
            nrPytania = 20;
        }

        if (nrPytania < 1) {
            nrPytania = 1;
        }
        refreshDots(nrPytania, dots);
