window.onload = function() {
    // Onload event of Javascript
    // Initializing timer variable
        var x = 60;
        var y = document.getElementById("timer");
        // Display count down for 20s
        setInterval(function() {
            if (x <= 61 && x >= 1) {
                x--;
                y.innerHTML = '' + x + '';
                if (x == 1) {
                x = 61;
            }
    }
    }, 1000);}
    // Form Submitting after 20s
    var auto_refresh = setInterval(function() {
    submitform();
    }, 60000);
    // Form submit function
    function submitform() {
        document.forms["questionForm"].submit();
    };