
function myFunc(e) {
    let x = document.getElementById("in").value;
    console.log(x);
    if (x != 0) {
        var reverse = "";
        var input = document.getElementById("in").value;
        var len = input.length;
        for (i = (len - 1); i >= 0; i--) {
            reverse += input[i];
        }
        if (input === reverse) {
            //    document.write(input+"  is Pallindrome");
            document.getElementById("demo").innerHTML = input + " is pallindrome input";
            console.log("pallindrome input");
        }
        else {
            // document.write(input+"  is Not a Pallindrome");
            document.getElementById("demo").innerHTML = input + " is Not a Pallindrome input";
        }
    }
    else if (x == false) {
        alert("must be filled input");
    }
}
function example(e) {
    let y = document.getElementById("ex").value;
    if (y == false) {
        document.getElementById("demo1").innerHTML = "<ul><li>MADAM</li><li>RACECAR</li><li>RADAR</li><li>LEVEL</li></ul>";
    }
    
}

