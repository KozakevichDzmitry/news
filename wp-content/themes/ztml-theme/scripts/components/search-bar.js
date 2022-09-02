jQuery(document).ready(function(){
    var btnOff = document.getElementById("searchBtnClose");
    var btnOn = document.getElementById("search-btn");
    var searchBar = document.getElementById("search-bar");
    var body = document.body;
    btnOn.addEventListener('click', openCloseSearch)
    btnOff.addEventListener('click', openCloseSearch)
    function openCloseSearch(){
        if(this.id === "searchBtnClose" ){
            document.body.classList.remove('disable-scroll');
            searchBar.classList.remove('active')
        } else if(this.id === "search-btn"){
            document.body.classList.add('disable-scroll');
            searchBar.classList.add('active')
        }
    }
})
