document.querySelector('.user-info-area').addEventListener('click', ()=>{
    closeUserWindow();

    document.querySelector('.user-actions').style.display = "flex";

    setTimeout(()=>{
        document.addEventListener('click', closeUserWindow);
    }, 500);
});


function closeUserWindow() {
    document.querySelector('.user-actions').style.display = "none";

    document.removeEventListener('click', closeUserWindow);
};



document.querySelectorAll('.stock-item-atual-stock').forEach(item=>{

    
    document.querySelectorAll('.stock-item-min-stock').forEach(item=>{
        if(atualStockValue <= item.innerText) {
            
        };
    });

});

