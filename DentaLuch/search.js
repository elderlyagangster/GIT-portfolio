document.querySelector("#search").oninput = function () {
    let val = this.value.trim();
    let elasticItems = document.querySelectorAll('.search .list-group-item');
    if (val != '') {
        elasticItems.forEach (function (elem) {
            if (elem. innerText.search(val) == -1) {
                elem.classList.add('hide');
            } 
            else {
                elem.classList.remove('hide');
            }
        });
    }
         else {
            elasticItems.forEach (function (elem) {
                elem.classList.remove('hide');
            });
        }
    }