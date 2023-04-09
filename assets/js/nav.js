// The following code is based off a toggle menu by @Bradcomp
// source: https://gist.github.com/Bradcomp/a9ef2ef322a8e8017443b626208999c1
(function() {
    var burger = document.querySelector('.burger');
    var menu = document.querySelector('#'+burger.dataset.target);
    burger.addEventListener('click', function() {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });
})();


(function() {
    var page = window.location.href.substring(window.location.href.lastIndexOf('/') + 1)
        if(!page) {
            page = "default"
        }
    var nav = document.getElementsByClassName("navLi")
    for(let e of nav[0].getElementsByTagName("li")) {
        if(e.id == page) {
            e.setAttribute("class", "is-active")
        }
    }
    
})()