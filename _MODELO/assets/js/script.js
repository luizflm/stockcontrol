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


