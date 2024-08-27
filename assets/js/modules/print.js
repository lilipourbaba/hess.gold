function print(){
    const PrintFactor = document.querySelector('.PrintFactor');
    PrintFactor.addEventListener("click", (event3) => {
        event3.window.print();
    });
}
 