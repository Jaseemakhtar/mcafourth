var fib0 = 0, 
    fib1 = 1,
    fibn,
    div = document.getElementsByTagName('div')[0],
    n;

n = prompt("Enter the value for n", "2");
div.innerHTML = fib();

function fib(){
    let fibonacci = [fib0, fib1];
    if(n <= 1){
        return fibonacci;
    }else{
        for(let i = 2; i < n; i++){
            fibn = fib0 + fib1;
            fib0 = fib1;
            fib1 = fibn;
            fibonacci.push(fibn);
        }
    }
    return fibonacci;
}