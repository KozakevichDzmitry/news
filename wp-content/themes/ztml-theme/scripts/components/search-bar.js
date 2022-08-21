window.onload=function(){

    var btnClose = document.getElementById("searchBtnClose");
    var btnOpen = document.getElementById("search-btn");
    var searchBar = document.getElementById("search-bar");
    btnOpen.addEventListener('click', openCloseSearch)
    btnClose.addEventListener('click', openCloseSearch)
    function openCloseSearch(){
        if(this.id === "searchBtnClose" ){
            searchBar.classList.remove('active')
        } else if(this.id === "search-btn"){
            searchBar.classList.add('active')
        }
    }
}
